<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

use Illuminate\Support\Str;

use function Orchestra\Testbench\package_path;

/**
 * The kit's skill, read the way deployer reads it.
 *
 * `.claude/skills/ui-kit` is what decides what a new site is: which prefabs a
 * kind of business cannot do without, which looks it may be drawn in, which
 * palettes each look takes, which layouts each page may stand in, and what a
 * layout's regions hold. Deployer's roll reads those files live and nothing
 * lists them in code. The framework tab's business views read the same files
 * through this class, so a view there is what a build would be given — and a
 * business, a direction or a design added to the skill is in the tab the moment
 * its file is.
 *
 * Everything is read once per request and kept: the files are small, and a
 * page asks for the same business a dozen times.
 *
 * @phpstan-type Page array{path: string, role: string, layouts: list<string>, prefabs: list<string>, label: ?string}
 * @phpstan-type Business array{name: string, summary: string, prefabs: array<string, string>, directions: array<string, string>, pages: list<Page>, file: string}
 * @phpstan-type Direction array{name: string, summary: string, layouts: array<string, string>, scheme: string, palettes: array<string, string>, suits: string, frames: string, looks: array<string, string>, file: string}
 * @phpstan-type Layout array{name: string, summary: string, family: string, regions: array<string, string>, recipe: array<string, string>, file: string}
 * @phpstan-type Palette array{name: string, summary: string, pairs: array<string, string>, costs: string, file: string}
 * @phpstan-type Component array{name: string, summary: string, variants: array<string, string>, placement: array<string, string>, behaviour: list<string>, file: string}
 * @phpstan-type Design array{name: string, slug: string, why: string, direction: string, palette: string, scheme: ?string, pages: array<string, string>, variants: array<string, string>}
 */
final class Kit
{
    /** @var array<string, mixed> */
    private static array $read = [];

    public static function path(string $relative = ''): string
    {
        return package_path('.claude/skills/ui-kit'.($relative === '' ? '' : '/'.$relative));
    }

    /**
     * Forget what was read: a test that writes a file reads it again.
     */
    public static function forget(): void
    {
        self::$read = [];
    }

    /**
     * @return array<string, Business>
     */
    public static function businesses(): array
    {
        return self::$read['businesses'] ??= self::folder('businesses', fn (string $name, string $body): array => [
            'name' => $name,
            'summary' => self::summary($body),
            'prefabs' => self::items($body, 'Prefabs'),
            'directions' => self::items($body, 'Directions'),
            'pages' => array_values(array_filter(array_map(self::page(...), self::section($body, 'Pages')))),
            'file' => "businesses/{$name}.md",
        ]);
    }

    /**
     * @return array<string, Direction>
     */
    public static function directions(): array
    {
        return self::$read['directions'] ??= self::folder('directions', fn (string $name, string $body): array => [
            'name' => $name,
            'summary' => self::summary($body),
            'layouts' => self::items($body, 'Layouts'),
            'scheme' => trim(self::section($body, 'Scheme')[0] ?? 'any', '`'),
            'palettes' => self::items($body, 'Palettes'),
            'suits' => implode(' ', self::section($body, 'Suits')),
            // `## Looks`: a paragraph on the frames, then how the direction draws each component.
            'frames' => self::plain(implode(' ', array_filter(self::section($body, 'Looks'), fn (string $line): bool => ! str_starts_with($line, '- ')))),
            'looks' => array_map(self::plain(...), self::items($body, 'Looks')),
            'file' => "directions/{$name}.md",
        ]);
    }

    /**
     * @return array<string, Layout>
     */
    public static function layouts(): array
    {
        return self::$read['layouts'] ??= self::folder('layouts', function (string $name, string $body): array {
            $regions = $recipe = [];

            // A region is said twice: `- nav: what it is`, then `- nav — what a roll places there`.
            foreach (self::section($body, 'Regions') as $line) {
                if (preg_match('/^- ([a-z][a-z0-9-]*): (.+)$/u', $line, $match)) {
                    $regions[$match[1]] = trim($match[2]);
                } elseif (preg_match('/^- ([a-z][a-z0-9-]*) — (.+)$/u', $line, $match)) {
                    $recipe[$match[1]] = trim($match[2]);
                }
            }

            return [
                'name' => $name,
                'summary' => self::summary($body),
                'family' => trim(self::section($body, 'Family')[0] ?? '', '`'),
                'regions' => $regions,
                'recipe' => $recipe,
                'file' => "layouts/{$name}.md",
            ];
        });
    }

    /**
     * @return array<string, Palette>
     */
    public static function palettes(): array
    {
        return self::$read['palettes'] ??= self::folder('themes', fn (string $name, string $body): array => [
            'name' => $name,
            'summary' => self::summary($body),
            'pairs' => self::items($body, 'Pairs with'),
            // `## Costs`: where the palette is the wrong one, in its own words.
            'costs' => self::plain(implode(' ', self::section($body, 'Costs'))),
            'file' => "themes/{$name}.md",
        ]);
    }

    /**
     * The themed components, each with the arrangements its own file accepts
     * and the sentence kit.css introduces each one with — the two places
     * deployer reads them from.
     *
     * @return array<string, Component>
     */
    public static function components(): array
    {
        return self::$read['components'] ??= (function (): array {
            $css = (string) file_get_contents(package_path('resources/css/kit.css'));
            preg_match_all('#/\* ([a-z][a-z0-9-]*) — ([a-z][a-z0-9-]*): ([^*]+?)\s*\*/#', $css, $said, PREG_SET_ORDER);

            $sentences = [];

            foreach ($said as [, $component, $variant, $sentence]) {
                $sentences[$component][$variant] = $sentence;
            }

            return self::folder('components', function (string $name, string $body) use ($sentences): array {
                $source = (string) @file_get_contents(package_path("resources/views/components/kit/{$name}.blade.php"));
                preg_match('/\$variant = in_array\(\$variant, \[([^\]]*)\], true\)/', $source, $match);
                preg_match_all("/'([a-z-]+)'/", $match[1] ?? '', $words);

                $variants = [];

                foreach ($words[1] as $variant) {
                    $variants[$variant] = $sentences[$name][$variant] ?? '';
                }

                // `## Placement`: `- <scope> — fits|first|never[: <note>]`, the scope a layout and a region.
                $placement = [];

                foreach (self::section($body, 'Placement') as $line) {
                    if (preg_match('/^- (\*|[a-z][a-z0-9-]*\.(?:\*|[a-z][a-z0-9-]*)|\*\.[a-z][a-z0-9-]*) — (fits|first|never)(?:: \S.*)?$/u', $line, $match)) {
                        $placement[$match[1]] = $match[2];
                    }
                }

                return [
                    'name' => $name,
                    'summary' => self::summary($body),
                    'variants' => $variants,
                    'placement' => $placement,
                    // `## Behaviour`: what it does once placed, each line ending on the laws it serves.
                    'behaviour' => array_values(array_map(
                        fn (string $line): string => self::plain(substr($line, 2)),
                        array_filter(self::section($body, 'Behaviour'), fn (string $line): bool => str_starts_with($line, '- ')),
                    )),
                    'file' => "components/{$name}.md",
                ];
            });
        })();
    }

    /**
     * Whether a component's own rules let it stand in one region of one
     * layout: the most exact line wins, and a region no line reaches is one it
     * fits, as `components/README.md` has it.
     */
    public static function fits(string $component, string $layout, string $region): bool
    {
        $placement = self::components()[$component]['placement'] ?? [];

        foreach (["{$layout}.{$region}", "{$layout}.*", "*.{$region}", '*'] as $scope) {
            if (isset($placement[$scope])) {
                return $placement[$scope] !== 'never';
            }
        }

        return true;
    }

    /**
     * The worked designs of one kind of business, from `designs/<business>.md`:
     * each a direction, a palette, a layout for every page and the
     * arrangements it chooses, with the sentence that says why.
     *
     * @return list<Design>
     */
    public static function designs(string $business): array
    {
        return self::$read['designs'][$business] ??= (function () use ($business): array {
            $path = self::path("designs/{$business}.md");

            if (! is_file($path)) {
                return [];
            }

            $designs = [];
            $current = null;

            foreach (preg_split('/\R/', (string) file_get_contents($path)) ?: [] as $line) {
                $line = trim($line);

                if (preg_match('/^## (.+)$/', $line, $match)) {
                    if ($current !== null) {
                        $designs[] = $current;
                    }

                    $current = [
                        'name' => trim($match[1]),
                        'slug' => self::slug($match[1]),
                        'why' => '',
                        'direction' => '',
                        'palette' => '',
                        'scheme' => null,
                        'pages' => [],
                        'variants' => [],
                    ];

                    continue;
                }

                if ($current === null || $line === '' || str_starts_with($line, '#')) {
                    continue;
                }

                if (! preg_match('/^- (\S+) — (.+)$/u', $line, $match)) {
                    // Prose: the first paragraph under the name is why the design is what it is.
                    $current['why'] = trim($current['why'].' '.$line);

                    continue;
                }

                [, $key, $value] = $match;
                $value = trim($value);

                match (true) {
                    $key === 'direction' => $current['direction'] = $value,
                    $key === 'palette' => $current['palette'] = $value,
                    $key === 'scheme' => $current['scheme'] = in_array($value, ['light', 'dark'], true) ? $value : null,
                    str_starts_with($key, '/') => $current['pages'][$key] = $value,
                    default => $current['variants'][$key] = $value,
                };
            }

            if ($current !== null) {
                $designs[] = $current;
            }

            return $designs;
        })();
    }

    /**
     * What a designs file says of its business above its first design.
     */
    public static function designsSummary(string $business): string
    {
        $path = self::path("designs/{$business}.md");

        return is_file($path) ? self::summary((string) file_get_contents($path)) : '';
    }

    /**
     * The layouts one page of a business may be drawn in under one direction:
     * the page's own, kept in its order, that the direction is drawn in too.
     *
     * @param  Page  $page
     * @return list<string>
     */
    public static function layoutsFor(array $page, string $direction): array
    {
        $drawnIn = array_keys(self::directions()[$direction]['layouts'] ?? []);

        return array_values(array_intersect($page['layouts'], $drawnIn));
    }

    /**
     * The palettes a direction takes, the recommended ones first.
     *
     * @return array<string, string> palette to verdict
     */
    public static function palettesFor(string $direction): array
    {
        $palettes = self::directions()[$direction]['palettes'] ?? [];
        $rank = ['best' => 0, 'good' => 1, 'fair' => 2];

        uasort($palettes, fn (string $a, string $b): int => ($rank[$a] ?? 3) <=> ($rank[$b] ?? 3));

        return $palettes;
    }

    public static function slug(string $name): string
    {
        return trim((string) preg_replace('/[^a-z0-9]+/', '-', strtolower(Str::ascii($name))), '-');
    }

    /**
     * @template T of array
     *
     * @param  callable(string, string): T  $read
     * @return array<string, T>
     */
    private static function folder(string $folder, callable $read): array
    {
        $found = [];

        foreach (glob(self::path($folder.'/*.md')) ?: [] as $path) {
            $name = basename($path, '.md');

            if ($name !== 'README') {
                $found[$name] = $read($name, (string) file_get_contents($path));
            }
        }

        ksort($found);

        return $found;
    }

    /**
     * Prose of the skill as a page prints it: the marks Markdown reads — the
     * backticks round a name, the asterisks round a stressed word — taken off,
     * the words kept. An asterisk that is part of a name (`*-title`) stays.
     */
    private static function plain(string $prose): string
    {
        return str_replace('`', '', (string) preg_replace('/(?<![\w*-])\*{1,2}(\w[^*]*?)\*{1,2}(?![\w*-])/u', '$1', $prose));
    }

    /**
     * The one paragraph under a file's `# name`, which ends at the first blank line.
     */
    private static function summary(string $body): string
    {
        return preg_match('/^# [^\n]+\n\n((?:[^\n#][^\n]*\n?)+)/', $body, $match)
            ? trim((string) preg_replace('/\s+/', ' ', $match[1]))
            : '';
    }

    /**
     * @return list<string> the lines of one section, blank ones left out
     */
    private static function section(string $body, string $heading): array
    {
        $lines = [];
        $inside = false;

        foreach (preg_split('/\R/', $body) ?: [] as $line) {
            $line = trim($line);

            if (str_starts_with($line, '#')) {
                if ($inside) {
                    break;
                }

                $inside = strcasecmp(trim(ltrim($line, '# ')), $heading) === 0;

                continue;
            }

            if ($inside && $line !== '') {
                $lines[] = $line;
            }
        }

        return $lines;
    }

    /**
     * @return array<string, string> the `- <name> — <words>` lines of one section
     */
    private static function items(string $body, string $heading): array
    {
        $items = [];

        foreach (self::section($body, $heading) as $line) {
            if (preg_match('/^- ([a-z][a-z0-9-]*) — (.+)$/u', $line, $match)) {
                $items[$match[1]] = trim($match[2]);
            }
        }

        return $items;
    }

    /**
     * One `## Pages` line: `- <path> — <role>: <layout> | …[; <prefab>, …][ — <label>]`.
     *
     * @return Page|null
     */
    private static function page(string $line): ?array
    {
        if (! preg_match('/^- (\/|(?:\/[a-z0-9]+(?:-[a-z0-9]+)*)+) — ([a-z][a-z0-9-]*): ([a-z][a-z0-9-]*(?: \| [a-z][a-z0-9-]*)*)(?:; ([a-z][a-z0-9-]*(?:, [a-z][a-z0-9-]*)*))?(?: — (\S.*))?$/u', $line, $match)) {
            return null;
        }

        return [
            'path' => $match[1],
            'role' => $match[2],
            'layouts' => explode(' | ', $match[3]),
            'prefabs' => ($match[4] ?? '') !== '' ? explode(', ', $match[4]) : [],
            'label' => ($match[5] ?? '') !== '' ? $match[5] : null,
        ];
    }
}
