<?php

declare(strict_types=1);

use function Orchestra\Testbench\package_path;

/*
 * The directions: a spec per direction under the skill's directions/, and a
 * section of kit.css that draws it. Deployer reads the one and the window
 * compiles the other, so they are held together here — a root block per spec
 * and none without one, every token declared, the scheme pinned only where the
 * spec pins it, and nothing in any rule that names a direction but the hooks,
 * the kit's own classes and the palette's tokens.
 */

/**
 * @return array<string, string> direction name to its spec
 */
function directionSpecs(): array
{
    $specs = [];

    foreach (glob(package_path('.claude/skills/ui-kit/directions/*.md')) ?: [] as $path) {
        if (basename($path) !== 'README.md') {
            $specs[basename($path, '.md')] = (string) file_get_contents($path);
        }
    }

    return $specs;
}

/**
 * The non-empty lines under one `## heading`, trimmed, up to the next heading.
 *
 * @return list<string>
 */
function specSection(string $body, string $heading): array
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
 * `- <name> — <rest>` items under one heading, as name to rest.
 *
 * @return array<string, string>
 */
function specItems(string $body, string $heading): array
{
    $items = [];

    foreach (specSection($body, $heading) as $line) {
        if (preg_match('/^- ([a-z][a-z0-9-]*) — (.+)$/u', $line, $match)) {
            $items[$match[1]] = trim($match[2]);
        }
    }

    return $items;
}

/**
 * The recipe lines of a `## Regions`: region to the component names it places.
 *
 * @return array<string, list<string>>
 */
function specRecipe(string $body): array
{
    $recipe = [];

    foreach (specItems($body, 'Regions') as $region => $slots) {
        $recipe[$region] = array_values(array_filter(array_map('trim', preg_split('/[,|+]/', $slots) ?: [])));
    }

    return $recipe;
}

/**
 * kit.css's style rules, comments taken out, with whether each sits in an
 * `@media` or `@supports` block. `@theme` and `@layer` are the kit's own and are
 * skipped: a direction is unlayered by rule.
 *
 * @return list<array{selector: string, body: string, nested: bool}>
 */
function directionRules(?string $css = null, bool $nested = false): array
{
    $css ??= (string) preg_replace('#/\*.*?\*/#s', '', (string) file_get_contents(package_path('resources/css/kit.css')));

    $rules = [];
    $at = 0;

    while (($open = strpos($css, '{', $at)) !== false) {
        $semicolon = strpos($css, ';', $at);

        // A statement at this level — @import, @source — ends before any block opens.
        if ($semicolon !== false && $semicolon < $open) {
            $at = $semicolon + 1;

            continue;
        }

        $depth = 1;
        $close = $open + 1;

        for (; $close < strlen($css) && $depth > 0; $close++) {
            $depth += match ($css[$close]) {
                '{' => 1,
                '}' => -1,
                default => 0,
            };
        }

        $prelude = trim(substr($css, $at, $open - $at));
        $body = substr($css, $open + 1, $close - $open - 2);
        $at = $close;

        if (preg_match('/^@(media|supports)\b/', $prelude)) {
            array_push($rules, ...directionRules($body, true));
        } elseif (! str_starts_with($prelude, '@')) {
            $rules[] = ['selector' => $prelude, 'body' => $body, 'nested' => $nested];
        }
    }

    return $rules;
}

/**
 * @return list<string>
 */
function directionTokens(): array
{
    return [
        '--section-gap', '--band-pad', '--band-surface', '--band-ink', '--hero-min-height',
        '--heading-size', '--heading-leading', '--eyebrow-case', '--eyebrow-tracking',
        '--radius-media', '--image-scrim', '--page-wash', '--panel-backdrop',
    ];
}

/**
 * @return list<string> the properties a block declares
 */
function declaredProperties(string $body): array
{
    preg_match_all('/(?:^|;)\s*(-{0,2}[a-z][a-z0-9-]*)\s*:/i', $body, $matches);

    return $matches[1];
}

it('has a spec for every direction, each read the way deployer reads it', function () {
    $themes = (string) file_get_contents(package_path('resources/css/themes.css'));
    preg_match_all("/\[data-palette='([a-z]+)'\]/", $themes, $palettes);

    $layouts = array_map(fn (string $path): string => basename($path, '.md'), glob(package_path('.claude/skills/ui-kit/layouts/*.md')) ?: []);
    $components = array_map(fn (string $path): string => basename($path, '.blade.php'), glob(package_path('resources/views/components/kit/*.blade.php')) ?: []);

    expect(array_keys(directionSpecs()))->toEqualCanonicalizing(['counter', 'hearth', 'market', 'studio']);

    foreach (directionSpecs() as $name => $spec) {
        expect($spec)->toStartWith("# {$name}\n\n")
            ->and(preg_match('/^# [^\n]+\n\n([^\n#][^\n]+)/', $spec))->toBe(1, "{$name} has no summary");

        // Drawn in several site layouts, each one with a recipe of its own:
        // the look and the arrangement are two choices, and the direction
        // carries no recipe that could only fit one of them.
        $drawnIn = array_keys(specItems($spec, 'Layouts'));
        expect($drawnIn)->not->toBeEmpty("{$name} is drawn in no layout")
            ->and(specSection($spec, 'Layout'))->toBeEmpty()
            ->and(specSection($spec, 'Regions'))->toBeEmpty();

        expect(trim(specSection($spec, 'Scheme')[0] ?? '', '`'))->toBeIn(['light', 'dark', 'any']);

        $verdicts = specItems($spec, 'Palettes');
        expect($verdicts)->not->toBeEmpty();

        foreach ($verdicts as $palette => $verdict) {
            expect($palettes[1])->toContain($palette)->and($verdict)->toBeIn(['best', 'good', 'fair']);
        }

        expect(specSection($spec, 'Suits'))->not->toBeEmpty()
            ->and(specSection($spec, 'Looks'))->not->toBeEmpty();

        // Each layout's regions, each said and each filled from what the kit ships.
        foreach ($drawnIn as $layout) {
            expect($layouts)->toContain($layout);

            $body = (string) file_get_contents(package_path(".claude/skills/ui-kit/layouts/{$layout}.md"));
            expect(trim(specSection($body, 'Family')[0] ?? '', '`'))->toBe('site', "{$name} is drawn in {$layout}, which is not a site layout");

            $recipe = specRecipe($body);
            expect($recipe)->not->toBeEmpty("{$layout}, which {$name} is drawn in, has no recipe");

            foreach ($recipe as $region => $names) {
                $role = array_filter(specSection($body, 'Regions'), fn (string $line): bool => str_starts_with($line, "- {$region}: "));
                expect($role)->toHaveCount(1, "{$layout} says nothing about what {$region} is");

                foreach ($names as $component) {
                    expect([...$components, 'prefabs', 'nothing'])->toContain($component);
                }
            }
        }
    }
});

it('draws every direction in exactly one root block, and nothing without a spec', function () {
    $roots = array_values(array_filter(
        directionRules(),
        fn (array $rule): bool => ! $rule['nested'] && preg_match("/^\[data-direction='[a-z][a-z0-9-]*'\]$/", $rule['selector']) === 1,
    ));

    $names = array_map(fn (array $rule): string => (string) preg_replace("/^\[data-direction='([a-z0-9-]+)'\]$/", '$1', $rule['selector']), $roots);

    expect($names)->toEqualCanonicalizing(array_keys(directionSpecs()));

    foreach ($roots as $index => $root) {
        $properties = declaredProperties($root['body']);
        $scheme = trim(specSection(directionSpecs()[$names[$index]], 'Scheme')[0], '`');

        // Every token, and nothing else: a palette token here would be the palette's axis taken over.
        expect(array_values(array_diff($properties, ['color-scheme'])))->toEqualCanonicalizing(directionTokens());

        if ($scheme === 'any') {
            expect($properties)->not->toContain('color-scheme');
        } else {
            expect($root['body'])->toMatch("/(^|;)\s*color-scheme:\s*{$scheme}\s*(;|$)/");
        }
    }

    // What an @media block says again under a root selector is a token, never a pin.
    foreach (directionRules() as $rule) {
        if ($rule['nested'] && preg_match("/^\[data-direction='[a-z0-9-]+'\]$/", $rule['selector'])) {
            expect(array_values(array_diff(declaredProperties($rule['body']), directionTokens())))->toBe([]);
        }
    }
});

it('pins a scheme dark only for hearth', function () {
    $pinned = array_keys(array_filter(
        directionSpecs(),
        fn (string $spec): bool => trim(specSection($spec, 'Scheme')[0], '`') !== 'any',
    ));

    expect($pinned)->toBe(['hearth']);
});

it('styles through the hooks and the palette, and nothing else', function () {
    $rules = array_values(array_filter(directionRules(), fn (array $rule): bool => str_contains($rule['selector'], 'data-direction')));

    expect(count($rules))->toBeGreaterThan(50);

    foreach ($rules as $rule) {
        $selector = (string) preg_replace('/\[[^\]]*\]/', '', $rule['selector']);
        preg_match_all('/\.([_a-zA-Z][\w-]*)/', $selector, $classes);

        expect(array_diff($classes[1], ['wrap', 'panel', 'btn', 'btn-primary', 'btn-secondary']))->toBe([], $rule['selector'])
            ->and($selector)->not->toContain('#')
            ->and($rule['body'])->not->toContain('{')
            ->and($rule['body'])->not->toContain('!important')
            ->and($rule['body'])->not->toMatch('/#[0-9a-f]{3,8}\b/i')
            ->and($rule['body'])->not->toMatch('/\b(?:rgba?|hsla?)\(/i')
            ->and($rule['body'])->not->toMatch('/--color-(?:white|black|slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose)\b/');

        // The scheme is the root block's to pin, and only there.
        if (preg_match("/^\[data-direction='[a-z0-9-]+'\]$/", $rule['selector']) !== 1) {
            expect(declaredProperties($rule['body']))->not->toContain('color-scheme');
        }

        // The stub hides a frame nothing was placed in: a display on the main frame has to keep that.
        if (in_array('display', declaredProperties($rule['body']), true)) {
            foreach (explode(',', $rule['selector']) as $part) {
                if (preg_match('/main > \.wrap$/', trim($part))) {
                    expect($part)->toContain(':has(> *)');
                }
            }
        }
    }
});

it('rolls a business only in the directions it lists', function () {
    $lists = [];

    foreach (glob(package_path('.claude/skills/ui-kit/businesses/*.md')) ?: [] as $path) {
        if (basename($path) !== 'README.md') {
            $body = (string) file_get_contents($path);
            $lists[basename($path, '.md')] = array_keys(specItems($body, 'Directions'));

            // Kept beside the directions for a deployer that reads nothing else.
            expect(trim(specSection($body, 'Layout')[0] ?? '', '`'))->toBe('marketing');
        }
    }

    ksort($lists);

    expect($lists)->toBe([
        'farm' => ['market', 'counter'],
        'restaurant' => ['hearth', 'counter'],
        'salon' => ['studio'],
        'shop' => ['counter'],
    ]);

    foreach ($lists as $directions) {
        expect(array_keys(directionSpecs()))->toContain(...$directions);
    }
});

/**
 * A colour in kit.css, resolved against a scope of custom properties: a hex, a
 * `var()` of one, or a `color-mix(in oklab, …)` of two — the three shapes a
 * band's tokens are written in. A property resolves in the scope it is declared
 * in, which is why the root's are resolved before a band's are laid over them.
 *
 * @param  array<string, string|list<float>>  $scope
 * @return list<float> sRGB, 0 to 1
 */
function bandColour(string $value, array $scope): array
{
    $value = trim($value);

    if (preg_match('/^var\((--[\w-]+)\)$/', $value, $match)) {
        $found = $scope[$match[1]] ?? throw new RuntimeException("{$match[1]} is not declared");

        return is_array($found) ? $found : bandColour($found, $scope);
    }

    if (preg_match('/^color-mix\(in oklab,\s*(var\([^)]+\))\s+(\d+)%,\s*(var\([^)]+\))\)$/', $value, $match)) {
        [$a, $b] = [oklab(bandColour($match[1], $scope)), oklab(bandColour($match[3], $scope))];
        $p = (float) $match[2] / 100;

        return fromOklab(array_map(fn (float $x, float $y): float => $x * $p + $y * (1 - $p), $a, $b));
    }

    if (preg_match('/^#([0-9a-f]{6})$/i', $value, $match)) {
        return array_map(fn (string $hex): float => hexdec($hex) / 255, str_split($match[1], 2));
    }

    throw new RuntimeException("cannot resolve {$value}");
}

function linear(float $c): float
{
    return $c <= 0.04045 ? $c / 12.92 : (($c + 0.055) / 1.055) ** 2.4;
}

/**
 * @param  list<float>  $rgb
 * @return list<float>
 */
function oklab(array $rgb): array
{
    [$r, $g, $b] = array_map(linear(...), $rgb);
    [$l, $m, $s] = array_map(fn (float $x): float => $x < 0 ? -((-$x) ** (1 / 3)) : $x ** (1 / 3), [
        0.4122214708 * $r + 0.5363325363 * $g + 0.0514459929 * $b,
        0.2119034982 * $r + 0.6806995451 * $g + 0.1073969566 * $b,
        0.0883024619 * $r + 0.2817188376 * $g + 0.6299787005 * $b,
    ]);

    return [
        0.2104542553 * $l + 0.7936177850 * $m - 0.0040720468 * $s,
        1.9779984951 * $l - 2.4285922050 * $m + 0.4505937099 * $s,
        0.0259040371 * $l + 0.7827717662 * $m - 0.8086757660 * $s,
    ];
}

/**
 * @param  list<float>  $lab
 * @return list<float>
 */
function fromOklab(array $lab): array
{
    [$L, $a, $b] = $lab;
    [$l, $m, $s] = [($L + 0.3963377774 * $a + 0.2158037573 * $b) ** 3, ($L - 0.1055613458 * $a - 0.0638541728 * $b) ** 3, ($L - 0.0894841775 * $a - 1.2914855480 * $b) ** 3];

    return array_map(
        fn (float $c): float => max(0, min(1, $c <= 0.0031308 ? 12.92 * $c : 1.055 * max(0, $c) ** (1 / 2.4) - 0.055)),
        [
            4.0767416621 * $l - 3.3077115913 * $m + 0.2309699292 * $s,
            -1.2684380046 * $l + 2.6097574011 * $m - 0.3413193965 * $s,
            -0.0041960863 * $l - 0.7034186147 * $m + 1.7076146010 * $s,
        ],
    );
}

/**
 * @param  list<float>  $a
 * @param  list<float>  $b
 */
function contrastRatio(array $a, array $b): float
{
    [$x, $y] = array_map(fn (array $c): float => 0.2126 * linear($c[0]) + 0.7152 * linear($c[1]) + 0.0722 * linear($c[2]), [$a, $b]);

    return (max($x, $y) + 0.05) / (min($x, $y) + 0.05);
}

it('writes a band\'s text at 4.5:1 in every palette its direction takes', function () {
    $themes = (string) file_get_contents(package_path('resources/css/themes.css'));
    $palettes = [];

    foreach (directionRules($themes) as $rule) {
        if (preg_match("/^\[data-palette='([a-z]+)'\]$/", $rule['selector'], $name) && ! isset($palettes[$name[1]])) {
            // A pair per scheme, or one value for both.
            preg_match_all('/(--color-[\w-]+):\s*(?:light-dark\((#[0-9a-f]{6}),\s*(#[0-9a-f]{6})\)|(#[0-9a-f]{6}))\s*(?:;|$)/i', $rule['body'], $tokens, PREG_SET_ORDER);
            $palettes[$name[1]] = array_map(fn (array $t): array => [$t[1], ($t[2] ?? '') ?: ($t[4] ?? ''), ($t[3] ?? '') ?: ($t[4] ?? '')], $tokens);
        }
    }

    $declarations = fn (string $body): array => array_column(
        preg_match_all('/(--[\w-]+)\s*:\s*([^;]+)/', $body, $found, PREG_SET_ORDER) ? $found : [], 2, 1,
    );
    $unreadable = [];

    foreach (directionSpecs() as $direction => $spec) {
        $root = $band = [];

        foreach (directionRules() as $rule) {
            if ($rule['nested']) {
                continue;
            }

            if ($rule['selector'] === "[data-direction='{$direction}']") {
                $root = $declarations($rule['body']);
            }

            // The band's own frame, for every direction or for this one: `[data-direction]`, `[data-direction='x']`, `:is(…)`.
            $prefix = (string) preg_replace("/\s*main > section:has\(> \.wrap \[data-kit='cta-band'\]\)$/", '', $rule['selector'], -1, $count);

            if ($count === 1 && ($prefix === '[data-direction]' || str_contains($prefix, "[data-direction='{$direction}']"))) {
                $band = [...$band, ...$declarations($rule['body'])];
            }
        }

        $schemes = trim(specSection($spec, 'Scheme')[0], '`') === 'dark' ? [1] : [0, 1];

        foreach (array_keys(specItems($spec, 'Palettes')) as $palette) {
            foreach ($schemes as $dark) {
                $scope = [];

                foreach ($palettes[$palette] as [$token, $light, $night]) {
                    $scope[$token] = $dark ? $night : $light;
                }

                // The band's two are computed on <html>, against the palette, before the band lays anything over them.
                $scope = [...$scope, ...$root];
                $scope = [...$scope, ...array_map(fn (string $value): array => bandColour($value, $scope), array_intersect_key($root, ['--band-surface' => 1, '--band-ink' => 1]))];
                $scope = [...$scope, ...$band];

                $surface = bandColour('var(--band-surface)', $scope);

                // The title and the details in the ink, the lead and the labels in the soft ink, the eyebrow and a hovered link in the accent.
                foreach (['--color-ink', '--color-ink-soft', '--color-accent'] as $token) {
                    if (($ratio = contrastRatio(bandColour("var({$token})", $scope), $surface)) < 4.5) {
                        $unreadable[] = sprintf('%s band in %s %s: %s is %.2f:1', $direction, $palette, $dark ? 'dark' : 'light', $token, $ratio);
                    }
                }
            }
        }
    }

    expect($unreadable)->toBe([]);
});

it('gives every layout a family, and the admin its one layout', function () {
    $families = [];

    foreach (glob(package_path('.claude/skills/ui-kit/layouts/*.md')) ?: [] as $path) {
        if (basename($path) !== 'README.md') {
            $families[basename($path, '.md')] = trim(specSection((string) file_get_contents($path), 'Family')[0] ?? '', '`');
        }
    }

    ksort($families);

    // Every website has an admin section, and console is its shape and nothing
    // else's: no page a visitor sees is drawn in it.
    expect($families)->toBe([
        'board' => 'site', 'carte' => 'site', 'console' => 'admin', 'focus' => 'app', 'journal' => 'site',
        'marketing' => 'site', 'poster' => 'site', 'split' => 'site', 'stacked' => 'app', 'workspace' => 'app',
    ]);
});
