<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * The shared UI kit: every component generated from the Tailwind Plus markup in /html.
 *
 * Components live at resources/views/components/ui/{category}/{group}/{name}.blade.php
 * and render as <x-ui.{category}.{group}.{name} />.
 *
 * @phpstan-type Component array{
 *     reference: string,
 *     name: string,
 *     category: string,
 *     group: string,
 *     tag: string,
 *     view: string,
 *     path: string,
 *     title: string,
 *     hasSlot: bool
 * }
 */
final class UiKit
{
    /**
     * Every component in the kit, indexed by its canonical reference.
     *
     * @var array<string, Component>|null
     */
    private static ?array $components = null;

    /**
     * The directory holding the generated components.
     */
    public static function root(): string
    {
        return resource_path('views/components/ui');
    }

    /**
     * Every component in the kit, keyed by canonical reference ("layout/cards/01-basic-card").
     *
     * @return array<string, Component>
     */
    public static function all(): array
    {
        if (self::$components !== null) {
            return self::$components;
        }

        $components = [];

        if (! File::isDirectory(self::root())) {
            return self::$components = $components;
        }

        foreach (File::allFiles(self::root()) as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $relative = str_replace('\\', '/', $file->getRelativePathname());
            $segments = explode('/', $relative);

            if (count($segments) !== 3) {
                continue;
            }

            [$category, $group, $filename] = $segments;
            $name = Str::before($filename, '.blade.php');
            $reference = "{$category}/{$group}/{$name}";

            $components[$reference] = [
                'reference' => $reference,
                'name' => $name,
                'category' => $category,
                'group' => $group,
                'tag' => "<x-ui.{$category}.{$group}.{$name} />",
                'view' => "components.ui.{$category}.{$group}.{$name}",
                'path' => $file->getPathname(),
                'title' => self::titleFor($name),
                'hasSlot' => str_contains((string) File::get($file->getPathname()), '{{ $slot }}'),
            ];
        }

        ksort($components);

        return self::$components = $components;
    }

    /**
     * Resolve a `::reference` the way the ui-kit skill documents it.
     *
     * An exact reference returns a single match. A short or partial name returns
     * every candidate, because component names are not unique once flattened.
     *
     * @return array{match: Component|null, candidates: list<Component>}
     */
    public static function resolve(string $reference): array
    {
        $needle = self::normalise($reference);
        $all = self::all();

        if (isset($all[$needle])) {
            return ['match' => $all[$needle], 'candidates' => [$all[$needle]]];
        }

        $byName = array_values(array_filter(
            $all,
            static fn (array $component): bool => $component['name'] === $needle
        ));

        if (count($byName) === 1) {
            return ['match' => $byName[0], 'candidates' => $byName];
        }

        if ($byName !== []) {
            return ['match' => null, 'candidates' => $byName];
        }

        return ['match' => null, 'candidates' => self::search($needle)];
    }

    /**
     * Components whose reference, name, group or category matches the given term.
     *
     * @return list<Component>
     */
    public static function search(string $term, ?string $category = null): array
    {
        $needle = self::words($term);

        $matches = array_filter(self::all(), static function (array $component) use ($needle, $category): bool {
            if ($category !== null && $component['category'] !== $category) {
                return false;
            }

            if ($needle === '') {
                return true;
            }

            $haystack = self::words("{$component['reference']} {$component['title']}");
            $group = self::words(Str::singular($component['group']));

            return str_contains($haystack, $needle)
                || str_contains($group, $needle)
                || str_contains($needle, $group);
        });

        return array_values($matches);
    }

    /**
     * The category => groups => component count map, for browsing the kit.
     *
     * @return array<string, array<string, int>>
     */
    public static function tree(): array
    {
        $tree = [];

        foreach (self::all() as $component) {
            $tree[$component['category']][$component['group']] ??= 0;
            $tree[$component['category']][$component['group']]++;
        }

        ksort($tree);

        return $tree;
    }

    /**
     * The raw Blade markup for a component.
     *
     * @param  Component  $component
     */
    public static function markup(array $component): string
    {
        return rtrim((string) File::get($component['path']), "\n");
    }

    /**
     * Flatten a term to lowercase space separated words, so that "sign in",
     * "sign-in" and "sign_in" all match the "sign-in-forms" group.
     */
    private static function words(string $value): string
    {
        return Str::of($value)
            ->ltrim(':')
            ->lower()
            ->replaceMatches('/[^a-z0-9]+/', ' ')
            ->squish()
            ->value();
    }

    /**
     * Turn "01-basic-card" into "Basic card".
     */
    private static function titleFor(string $name): string
    {
        return Str::of($name)
            ->replaceMatches('/^\d+-/', '')
            ->replace('-', ' ')
            ->ucfirst()
            ->value();
    }

    /**
     * Strip the `::` sigil and normalise separators and case.
     */
    private static function normalise(string $reference): string
    {
        return Str::of($reference)
            ->trim()
            ->ltrim(':')
            ->trim('/')
            ->lower()
            ->replace('.', '/')
            ->value();
    }
}
