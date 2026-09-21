<?php

declare(strict_types=1);

namespace App\Support;

use App\Enums\KitComponent;
use App\Enums\KitLayout;
use App\Enums\Project;
use App\Enums\Theme;
use App\Enums\Variation;
use Illuminate\Support\Facades\View;

/**
 * The application as a graph of the things it is made of, and what each one is
 * related to.
 *
 * Five kinds of node — the kit's components, the five layouts, the nine
 * projects, the seven palettes and the three degrees — and every edge between
 * them is read from the code rather than written down here:
 *
 * - a **layout** is joined to a **component** when the layout's own view, or
 *   any section body a project renders inside it, actually writes that
 *   `<x-kit.…>` tag. {@see componentsFor()} reads the Blade sources to find
 *   out, following literal `@include`s, so the graph cannot drift from the
 *   views the way a hand-kept list would.
 * - a **layout** is joined to a **project** when the project declares a section
 *   in it ({@see Project::sections()}).
 * - a **layout** is joined to the **palette** and the **degree** its own spec
 *   rates best ({@see KitLayout::palette()}, {@see KitLayout::variation()}).
 *
 * The layouts are therefore the spine: everything else hangs off them, which
 * is why the page draws them down the middle. A palette nothing is pinned to —
 * blossom and vellum — is a node with no edge, and that is the truth about it.
 *
 * Every node carries the route that shows it, so the graph is a way of getting
 * somewhere and not only a picture.
 *
 * @phpstan-type Node array{id: string, kind: string, value: string, label: string, href: string, group?: string}
 * @phpstan-type Edge array{from: string, to: string}
 */
final class DesignGraph
{
    public const COMPONENT = 'component';

    public const LAYOUT = 'layout';

    public const PROJECT = 'project';

    public const PALETTE = 'palette';

    public const DEGREE = 'degree';

    /**
     * The kinds, in the order the page draws them.
     *
     * @return array<int, string>
     */
    public static function kinds(): array
    {
        return [self::COMPONENT, self::LAYOUT, self::PROJECT, self::PALETTE, self::DEGREE];
    }

    /**
     * Every node, grouped by kind and in each enum's own declaration order.
     *
     * @return array<string, array<int, Node>>
     */
    public static function nodes(): array
    {
        return [
            self::COMPONENT => array_map(fn (KitComponent $case): array => [
                'id' => self::COMPONENT.':'.$case->value,
                'kind' => self::COMPONENT,
                'value' => $case->value,
                'label' => $case->label(),
                'group' => $case->groupLabel(),
                'href' => route('ui-kit').'#'.$case->value,
            ], KitComponent::cases()),

            self::LAYOUT => array_map(fn (KitLayout $case): array => [
                'id' => self::LAYOUT.':'.$case->value,
                'kind' => self::LAYOUT,
                'value' => $case->value,
                'label' => $case->label(),
                'href' => route('framework', ['layout' => $case->value]),
            ], KitLayout::cases()),

            self::PROJECT => array_map(fn (Project $case): array => [
                'id' => self::PROJECT.':'.$case->value,
                'kind' => self::PROJECT,
                'value' => $case->value,
                'label' => $case->label(),
                'href' => route('framework', ['project' => $case->value]),
            ], Project::cases()),

            self::PALETTE => array_map(fn (Theme $case): array => [
                'id' => self::PALETTE.':'.$case->value,
                'kind' => self::PALETTE,
                'value' => $case->value,
                'label' => $case->label(),
                'href' => route('framework', ['theme' => $case->value]),
            ], Theme::cases()),

            self::DEGREE => array_map(fn (Variation $case): array => [
                'id' => self::DEGREE.':'.$case->value,
                'kind' => self::DEGREE,
                'value' => $case->value,
                'label' => $case->label(),
                'href' => route('framework', ['variation' => $case->value]),
            ], Variation::cases()),
        ];
    }

    /**
     * Every edge, each one derived rather than declared.
     *
     * @return array<int, Edge>
     */
    public static function edges(): array
    {
        $edges = [];

        foreach (KitLayout::cases() as $layout) {
            $from = self::LAYOUT.':'.$layout->value;

            foreach (self::componentsFor($layout) as $component) {
                $edges[] = ['from' => $from, 'to' => self::COMPONENT.':'.$component];
            }

            foreach (self::projectsFor($layout) as $project) {
                $edges[] = ['from' => $from, 'to' => self::PROJECT.':'.$project];
            }

            $edges[] = ['from' => $from, 'to' => self::PALETTE.':'.$layout->palette()->value];
            $edges[] = ['from' => $from, 'to' => self::DEGREE.':'.$layout->variation()->value];
        }

        return $edges;
    }

    /**
     * The projects that declare at least one section in this layout.
     *
     * @return array<int, string>
     */
    public static function projectsFor(KitLayout $layout): array
    {
        return array_values(array_filter(
            array_map(fn (Project $project): ?string => array_filter(
                $project->sections(),
                fn (array $section): bool => $section['layout'] === $layout,
            ) === [] ? null : $project->value, Project::cases()),
        ));
    }

    /**
     * The kit components this layout actually puts on the page: the ones its
     * own view writes, plus the ones written by every section body any project
     * renders inside it.
     *
     * @return array<int, string>
     */
    public static function componentsFor(KitLayout $layout): array
    {
        $views = ['framework.layouts.'.$layout->value];

        foreach (Project::cases() as $project) {
            foreach ($project->sections() as $section) {
                if ($section['layout'] === $layout) {
                    $views[] = $section['view'];
                }
            }
        }

        return self::componentsIn($views);
    }

    /**
     * The kit components written anywhere in these views or in the views they
     * include. Only literal `@include('…')` is followed — the one dynamic
     * include in the framework is a section body, and those are passed in.
     *
     * @param  array<int, string>  $views
     * @return array<int, string>
     */
    private static function componentsIn(array $views): array
    {
        $seen = [];
        $found = [];

        while ($views !== []) {
            $view = array_shift($views);

            if (isset($seen[$view]) || ! View::exists($view)) {
                continue;
            }

            $seen[$view] = true;
            $source = (string) file_get_contents(View::getFinder()->find($view));

            preg_match_all('/<x-kit\.([a-z0-9-]+)/', $source, $tags);

            foreach ($tags[1] as $tag) {
                if (KitComponent::tryFrom($tag) instanceof KitComponent) {
                    $found[$tag] = true;
                }
            }

            preg_match_all("/@include\('([a-zA-Z0-9._-]+)'/", $source, $includes);

            foreach ($includes[1] as $include) {
                $views[] = $include;
            }
        }

        ksort($found);

        return array_keys($found);
    }
}
