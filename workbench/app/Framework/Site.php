<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

use Illuminate\Support\Facades\Blade;

use function Orchestra\Testbench\package_path;

/**
 * One page of one kind of business, composed the way a build composes it.
 *
 * {@see Kit} reads what the skill decides: the pages a business has, the
 * prefabs each one holds, the directions it may be drawn in and the layouts
 * each direction takes. A design (`designs/<business>.md`) settles the choices
 * a roll would otherwise draw — one direction, one palette, one layout per
 * page, the arrangements — and `workbench/content/<business>.php` holds the
 * words and the rows of a fictional business of that kind. This class puts the
 * three together: it resolves what a URL asks for into a choice that can be
 * drawn ({@see choose()}), plans which component goes in which region of the
 * layout by the layout's own recipe ({@see plan()}), and renders each region
 * ({@see regions()}).
 *
 * The prefabs are drawn as a site draws them: the tag bare, its data bound as
 * `kit.<name>`. So a page here exercises the same path a generated site runs,
 * and a prefab whose content is missing renders nothing, as it would there.
 *
 * @phpstan-import-type Business from Kit
 * @phpstan-import-type Page from Kit
 * @phpstan-import-type Design from Kit
 *
 * @phpstan-type Choice array{
 *     business: Business, content: array<string, mixed>, designs: list<Design>, design: Design,
 *     page: Page, direction: string, palette: string, layout: string, scheme: ?string,
 *     variants: array<string, string>, chosen: array<string, bool>
 * }
 * @phpstan-type Placed array{component: string, variant: ?string, prefab: bool, props: array<string, mixed>, slot: ?string}
 */
final class Site
{
    /** What a side column's recipe names, which stand there first and in this order. */
    private const SIDE = ['schedule', 'map'];

    /** @var array<string, array<string, mixed>|null> */
    private static array $content = [];

    /**
     * The demo content of one business, or null when nobody has written it.
     *
     * @return array<string, mixed>|null
     */
    public static function content(string $business): ?array
    {
        if (! array_key_exists($business, self::$content)) {
            $path = package_path("workbench/content/{$business}.php");
            self::$content[$business] = preg_match('/^[a-z][a-z0-9-]*$/', $business) && is_file($path) ? require $path : null;
        }

        return self::$content[$business];
    }

    /**
     * The businesses that can be drawn: the skill's, that have content here.
     *
     * @return array<string, Business>
     */
    public static function businesses(): array
    {
        return array_filter(Kit::businesses(), fn (array $business): bool => self::content($business['name']) !== null);
    }

    /**
     * The designs of a business, or the one a roll's first draw would be when
     * no file settles any: its first direction, that direction's first
     * recommended palette, and the first layout each page shares with it.
     *
     * @return list<Design>
     */
    public static function designs(string $business): array
    {
        $designs = Kit::designs($business);

        if ($designs !== []) {
            return $designs;
        }

        $spec = Kit::businesses()[$business] ?? null;
        $direction = array_key_first($spec['directions'] ?? []);

        if ($spec === null || $direction === null) {
            return [];
        }

        return [[
            'name' => ucfirst($direction),
            'slug' => $direction,
            'why' => '',
            'direction' => $direction,
            'palette' => (string) array_key_first(Kit::palettesFor($direction)),
            'scheme' => null,
            'pages' => array_combine(
                array_column($spec['pages'], 'path'),
                array_map(fn (array $page): string => Kit::layoutsFor($page, $direction)[0] ?? $page['layouts'][0], $spec['pages']),
            ),
            'variants' => [],
        ]];
    }

    /**
     * What a query string asks for, made into something that can be drawn. A
     * design settles every axis; the query may override one, and an override
     * the skill would refuse — a direction the business does not list, a
     * palette the direction does not take, a layout the page cannot stand in —
     * falls back to the design's rather than drawing what no build would.
     *
     * @param  array<string, mixed>  $query
     * @return Choice|null null when there is no business to draw
     */
    public static function choose(array $query): ?array
    {
        $businesses = self::businesses();
        $name = is_string($query['business'] ?? null) && isset($businesses[$query['business']])
            ? $query['business']
            : (isset($businesses['restaurant']) ? 'restaurant' : array_key_first($businesses));

        if ($name === null) {
            return null;
        }

        $business = $businesses[$name];
        $designs = self::designs($name);
        $design = collect($designs)->firstWhere('slug', $query['design'] ?? null) ?? $designs[0];

        $page = collect($business['pages'])->firstWhere('path', $query['page'] ?? '/') ?? $business['pages'][0];

        $asked = fn (string $key): ?string => is_string($query[$key] ?? null) && $query[$key] !== '' ? $query[$key] : null;

        $direction = isset($business['directions'][$asked('direction')]) ? (string) $asked('direction') : $design['direction'];

        $palettes = Kit::palettesFor($direction);
        $palette = match (true) {
            isset($palettes[$asked('palette')]) => (string) $asked('palette'),
            isset($palettes[$design['palette']]) => $design['palette'],
            default => (string) array_key_first($palettes),
        };

        $layouts = Kit::layoutsFor($page, $direction) ?: $page['layouts'];
        $layout = match (true) {
            in_array($asked('layout'), $layouts, true) => (string) $asked('layout'),
            in_array($design['pages'][$page['path']] ?? null, $layouts, true) => $design['pages'][$page['path']],
            default => $layouts[0],
        };

        // `system` hands light or dark back to the viewer's own, over a design that pins one.
        $scheme = match (true) {
            in_array($asked('scheme'), ['light', 'dark'], true) => $asked('scheme'),
            $asked('scheme') === 'system' => null,
            default => $design['scheme'],
        };

        $components = Kit::components();
        $variants = $design['variants'];

        foreach ((array) ($query['v'] ?? []) as $component => $variant) {
            if (! is_string($variant) || ! isset($components[$component])) {
                continue;
            }

            if ($variant === '-') {
                unset($variants[$component]);
            } elseif (isset($components[$component]['variants'][$variant])) {
                $variants[$component] = $variant;
            }
        }

        return [
            'business' => $business,
            'content' => (array) self::content($name),
            'designs' => $designs,
            'design' => $design,
            'page' => $page,
            'direction' => $direction,
            'palette' => $palette,
            'layout' => $layout,
            'scheme' => $scheme,
            'variants' => $variants,
            // Whether each axis is the viewer's own choice rather than the design's.
            'chosen' => [
                'direction' => $direction !== $design['direction'],
                'palette' => $palette !== $design['palette'],
                'layout' => $layout !== ($design['pages'][$page['path']] ?? null),
                'scheme' => $scheme !== $design['scheme'],
                'variants' => $variants !== $design['variants'],
            ],
        ];
    }

    /**
     * The query string of a choice, with some of it changed. An axis the
     * viewer has not overridden is left out: absent means the design's, which
     * is what makes a design's URL short and an override visible.
     *
     * @param  Choice  $choice
     * @param  array<string, mixed>  $changes  an axis set to null goes back to the design's
     * @return array<string, mixed>
     */
    public static function query(array $choice, array $changes = []): array
    {
        $design = $choice['design'];

        $query = [
            'business' => $choice['business']['name'],
            'design' => $design['slug'],
            'page' => $choice['page']['path'],
            'direction' => $choice['chosen']['direction'] ? $choice['direction'] : null,
            'palette' => $choice['chosen']['palette'] ? $choice['palette'] : null,
            'layout' => $choice['chosen']['layout'] ? $choice['layout'] : null,
            'scheme' => $choice['chosen']['scheme'] ? ($choice['scheme'] ?? 'system') : null,
            'v' => $choice['chosen']['variants']
                ? array_merge(
                    array_fill_keys(array_keys(array_diff_key($design['variants'], $choice['variants'])), '-'),
                    array_diff_assoc($choice['variants'], $design['variants']),
                )
                : null,
        ];

        // Another business or another design starts from its own choices; another page keeps the look and drops the layout.
        if (array_key_exists('business', $changes) || array_key_exists('design', $changes)) {
            $query = array_merge($query, ['direction' => null, 'palette' => null, 'layout' => null, 'v' => null]);
        }

        if (array_key_exists('business', $changes)) {
            $query = array_merge($query, ['design' => null, 'page' => null]);
        }

        if (array_key_exists('page', $changes) || array_key_exists('direction', $changes)) {
            $query['layout'] = null;
        }

        if (array_key_exists('direction', $changes)) {
            $query['palette'] = null;
        }

        $query = array_merge($query, $changes);

        if (($query['page'] ?? null) === '/') {
            $query['page'] = null;
        }

        return array_filter($query, fn (mixed $value): bool => $value !== null && $value !== []);
    }

    /**
     * Which component goes in which region: the layout's recipe, filled from
     * the page's own prefabs and the words the content has for it.
     *
     * @param  Choice  $choice
     * @param  callable(string): string  $url  a page's path in, its address out
     * @return array<string, list<Placed>>
     */
    public static function plan(array $choice, callable $url): array
    {
        $content = $choice['content'];
        $site = (array) ($content['site'] ?? []);
        $page = $choice['page'];
        $words = (array) ($content['pages'][$page['path']] ?? []);
        $layout = $choice['layout'];
        $variants = $choice['variants'];
        $regions = array_keys(Kit::layouts()[$layout]['regions'] ?? []);

        $links = fn (array $links): array => array_values(array_map(fn (array $link): array => [
            'label' => $link['label'] ?? null,
            'href' => isset($link['to']) ? $url($link['to']) : ($link['href'] ?? '#'),
        ], $links));

        $place = fn (string $component, array $props = [], ?string $slot = null): array => [
            'component' => $component,
            'variant' => $variants[$component] ?? null,
            'prefab' => false,
            'props' => $props,
            'slot' => $slot,
        ];

        $prefab = fn (string $name): array => [
            'component' => $name,
            'variant' => $variants[$name] ?? null,
            'prefab' => true,
            'props' => [],
            'slot' => null,
        ];

        // The skill's labels are English defaults; a site says its pages in its own words.
        $navigation = array_values(array_map(fn (array $other): array => [
            'label' => $content['pages'][$other['path']]['label'] ?? $other['label'],
            'href' => $url($other['path']),
            'current' => $other['path'] === $page['path'],
        ], array_filter($choice['business']['pages'], fn (array $other): bool => $other['label'] !== null)));

        $hero = (array) ($words['hero'] ?? []);

        $opening = fn (): array => $place('hero', [
            'eyebrow' => $hero['eyebrow'] ?? null,
            'title' => $hero['title'] ?? ($site['brand'] ?? null),
            'lead' => $hero['lead'] ?? null,
            'image' => $hero['image'] ?? null,
            'subject' => $hero['subject'] ?? null,
            'note' => $hero['note'] ?? null,
            'links' => $links((array) ($hero['links'] ?? [])),
            'facts' => (array) ($hero['facts'] ?? []),
        ]);

        // Where a layout opens on a heading instead of a hero, the heading is the page's one h1.
        $heading = fn (): array => $place('section', [
            'eyebrow' => $hero['eyebrow'] ?? null,
            'title' => $hero['title'] ?? ($site['brand'] ?? null),
            'lead' => $hero['lead'] ?? null,
            'level' => 1,
        ]);

        $prose = function (array $story) use ($place): array {
            $paragraphs = array_filter((array) ($story['body'] ?? []), 'filled');

            return $place('section', [
                'eyebrow' => $story['eyebrow'] ?? null,
                'title' => $story['title'] ?? null,
                'lead' => $story['lead'] ?? null,
            // A reading measure and air between the paragraphs: both classes are ones the kit's own components use.
            ], $paragraphs === [] ? null : '<div class="max-w-prose space-y-4">'.implode('', array_map(fn (string $paragraph): string => '<p>'.e($paragraph).'</p>', $paragraphs)).'</div>');
        };

        $features = isset($words['features']) ? $place('features', [
            'eyebrow' => $words['features']['eyebrow'] ?? null,
            'title' => $words['features']['title'] ?? null,
            'lead' => $words['features']['lead'] ?? null,
            'items' => array_map(function (array $item) use ($url): array {
                if (isset($item['to'])) {
                    $item['href'] = $url($item['to']);
                }

                return $item;
            }, (array) ($words['features']['items'] ?? [])),
        ]) : null;

        $story = isset($words['story']) ? $prose((array) $words['story']) : null;

        $ask = (array) ($words['band'] ?? ($site['band'] ?? []));
        $band = $ask === [] ? null : $place('cta-band', [
            'eyebrow' => $ask['eyebrow'] ?? null,
            'title' => $ask['title'] ?? null,
            'lead' => $ask['lead'] ?? null,
            'links' => $links((array) ($ask['links'] ?? [])),
            'details' => (array) ($ask['details'] ?? []),
        ]);

        // The page's prefabs, each placed once and only where its own rules let it stand (`components/<name>.md`,
        // `## Placement`). The side column takes the hours and the map where the layout has one, then what else
        // of the page a side column fits, a business with no hours to give putting who vouches for it there;
        // carte's offer takes the list the page is for; the rest stand in main in the page's order.
        $own = $page['prefabs'];
        $column = array_values(array_intersect(['visit', 'facts'], $regions))[0] ?? null;
        $side = $column === null ? [] : array_slice(array_values(array_filter(
            [...array_intersect(self::SIDE, $own), ...array_diff($own, self::SIDE)],
            fn (string $name): bool => isset(Kit::components()[$name]['placement']["{$layout}.{$column}"]) && Kit::fits($name, $layout, $column),
        )), 0, 3);
        $offer = in_array('offer', $regions, true)
            ? array_slice(array_values(array_filter(
                array_diff($own, $side),
                fn (string $name): bool => isset(Kit::components()[$name]['placement']['carte.offer']) && Kit::fits($name, $layout, 'offer'),
            )), 0, 1)
            : [];
        $rest = array_map($prefab, array_values(array_diff($own, $side, $offer)));
        $home = $page['path'] === '/';

        $plan = [];

        foreach ($regions as $region) {
            $plan[$region] = array_values(array_filter(match ($region) {
                'nav' => [$place('site-header', [
                    'brand' => $site['brand'] ?? null,
                    'items' => $navigation,
                    'action' => isset($site['action']) ? ['label' => $site['action']['label'] ?? null, 'href' => isset($site['action']['to']) ? $url($site['action']['to']) : ($site['action']['href'] ?? '#')] : null,
                    'status' => $site['status'] ?? null,
                    'phone' => $site['phone'] ?? null,
                ])],
                'hero' => [$layout === 'board' && ! $home ? $heading() : $opening()],
                'lead' => [$heading()],
                'visit', 'facts' => array_map($prefab, $side),
                'offer' => array_map($prefab, $offer),
                'story' => [$story],
                'gallery' => [$features],
                'band' => [$band],
                'footer' => [$place('site-footer', [
                    'brand' => $site['brand'] ?? null,
                    'blurb' => $site['blurb'] ?? null,
                    'address' => $site['address'] ?? null,
                    'phone' => $site['phone'] ?? null,
                    'email' => $site['email'] ?? null,
                    'note' => $site['note'] ?? null,
                    'links' => array_map(fn (array $item): array => ['label' => $item['label'], 'href' => $item['href']], $navigation),
                ])],
                'main' => match ($layout) {
                    // The recipes, as the layouts' own files give them.
                    'marketing' => $home ? [$features, ...$rest, $story] : [...$rest, $features, $story],
                    'carte' => [...$rest, $features, $story],
                    // A board's first tile is its large one: home's own blocks, and on any other page what the page is for.
                    'board' => $home ? [$features, ...$rest, $story, $band] : [...$rest, $features, $story, $band],
                    'journal' => $rest,
                    default => [...$rest, $features, $story],
                },
                default => [],
            }));
        }

        return $plan;
    }

    /**
     * Each region of the page as markup, ready for the layout's frames.
     *
     * @param  Choice  $choice
     * @param  callable(string): string  $url
     * @return array<string, string>
     */
    public static function regions(array $choice, callable $url): array
    {
        $bound = (array) ($choice['content']['prefabs'] ?? []);

        return array_map(function (array $placed) use ($bound, $url): string {
            return implode("\n", array_map(function (array $one) use ($bound, $url): string {
                $variant = $one['variant'] !== null ? ' variant="'.e($one['variant']).'"' : '';

                if ($one['prefab']) {
                    // As a site binds it: the tag bare, the rows the owner keeps behind it.
                    app()->instance('kit.'.$one['component'], Picture::resolve(self::linked((array) ($bound[$one['component']] ?? []), $url)));

                    return Blade::render("<x-kit.{$one['component']}{$variant} />");
                }

                $attributes = implode(' ', array_map(
                    fn (string $prop): string => ':'.\Illuminate\Support\Str::kebab($prop).'="$props[\''.$prop.'\']"',
                    array_keys($one['props']),
                ));

                return $one['slot'] === null
                    ? Blade::render("<x-kit.{$one['component']} {$attributes}{$variant} />", ['props' => $one['props']])
                    : Blade::render("<x-kit.{$one['component']} {$attributes}{$variant}>{!! \$inner !!}</x-kit.{$one['component']}>", ['props' => $one['props'], 'inner' => $one['slot']]);
            }, $placed));
        }, self::plan($choice, $url));
    }

    /**
     * A prefab's rows with every `to` — a page of the business, by its path —
     * made the `href` the component reads, so a plan's button or a project's
     * card leads where the content says without knowing the showcase's addresses.
     *
     * @param  array<array-key, mixed>  $rows
     * @param  callable(string): string  $url
     * @return array<array-key, mixed>
     */
    private static function linked(array $rows, callable $url): array
    {
        foreach ($rows as $key => $value) {
            if (is_array($value)) {
                $rows[$key] = self::linked($value, $url);
            }
        }

        if (is_string($rows['to'] ?? null) && ! isset($rows['href'])) {
            $rows['href'] = $url($rows['to']);
        }

        return $rows;
    }

    /**
     * How many views a business has by its designs alone: every page of every design.
     */
    public static function views(string $business): int
    {
        return count(self::designs($business)) * count(Kit::businesses()[$business]['pages'] ?? []);
    }

    /**
     * The home page of a business once in every palette each of its directions
     * recommends: what a roll may draw before any design settles it. Each is
     * the query of one view, under the direction it belongs to.
     *
     * @return array<string, list<array<string, string>>>
     */
    public static function rolls(string $business): array
    {
        $spec = Kit::businesses()[$business] ?? null;
        $designs = self::designs($business);
        $rolls = [];

        foreach (array_keys($spec['directions'] ?? []) as $direction) {
            // The design already drawn in this direction lends its layouts and arrangements.
            $design = collect($designs)->firstWhere('direction', $direction) ?? ($designs[0] ?? null);

            foreach (Kit::palettesFor($direction) as $palette => $verdict) {
                if ($verdict === 'fair' || $design === null) {
                    continue;
                }

                $rolls[$direction][] = array_filter([
                    'business' => $business,
                    'design' => $design['slug'],
                    'direction' => $direction === $design['direction'] ? null : $direction,
                    'palette' => $palette === $design['palette'] && $direction === $design['direction'] ? null : $palette,
                    'label' => $palette,
                    'verdict' => $verdict,
                ]);
            }
        }

        return $rolls;
    }
}
