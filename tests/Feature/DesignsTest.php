<?php

declare(strict_types=1);

use Workbench\App\Framework\Kit;

use function Orchestra\Testbench\package_path;

/*
 * designs/<business>.md: the worked designs of each kind of business, one
 * settled roll each — a direction, a palette, a layout for every page and the
 * arrangements — with the sentence that says why. The framework tab draws every
 * one of them and a session building a site starts from the nearest, so a
 * design is held against the rest of the skill: it chooses nothing the skill
 * itself would refuse.
 */

/**
 * @return list<string> the businesses that have designs
 */
function designedBusinesses(): array
{
    return array_values(array_filter(
        array_map(fn (string $path): string => basename($path, '.md'), glob(package_path('.claude/skills/ui-kit/designs/*.md')) ?: []),
        fn (string $name): bool => $name !== 'README',
    ));
}

beforeEach(fn () => Kit::forget());

it('has designs for every business, and for nothing else', function () {
    expect(designedBusinesses())->toEqualCanonicalizing(array_keys(Kit::businesses()));
});

it('opens on its business and what its designs differ by, with three designs or more', function (string $business) {
    $body = (string) file_get_contents(package_path(".claude/skills/ui-kit/designs/{$business}.md"));

    expect($body)->toStartWith("# {$business}\n\n")
        ->and(Kit::designsSummary($business))->not->toBe('');

    $designs = Kit::designs($business);

    expect(count($designs))->toBeGreaterThanOrEqual(3, "{$business} has fewer than three designs");

    $names = array_column($designs, 'name');
    $slugs = array_column($designs, 'slug');

    expect($names)->toBe(array_values(array_unique($names)))
        ->and($slugs)->toBe(array_values(array_unique($slugs)));

    foreach ($designs as $design) {
        expect($design['why'])->not->toBe('', "{$business}'s {$design['name']} does not say why")
            ->and(mb_strlen($design['name']))->toBeLessThanOrEqual(32);
    }

    // Only the lines the format has: every `- ` line under a design is `- <key> — <value>`.
    foreach (preg_split('/\R/', (string) str($body)->after("\n## ")) ?: [] as $line) {
        if (str_starts_with($line, '- ')) {
            expect(preg_match('/^- (direction|palette|scheme|\/[a-z0-9\/-]*|[a-z][a-z0-9-]*) — [a-z][a-z0-9-]*$/u', $line))
                ->toBe(1, "{$business}: \"{$line}\" is not `- <key> — <value>`");
        }
    }
})->with(fn () => designedBusinesses());

it('chooses only what the skill would let a roll draw', function (string $business) {
    $spec = Kit::businesses()[$business];
    $directions = Kit::directions();
    $components = Kit::components();

    foreach (Kit::designs($business) as $design) {
        $said = "{$business}'s {$design['name']}";

        expect(isset($spec['directions'][$design['direction']]))->toBeTrue("{$said} is drawn in a direction its business does not list");

        $direction = $directions[$design['direction']];

        expect(isset($direction['palettes'][$design['palette']]))->toBeTrue("{$said} takes a palette {$design['direction']} does not");

        if ($design['scheme'] !== null) {
            expect($direction['scheme'])->toBe('any', "{$said} pins a scheme on a direction that pins its own");
        }

        // A layout for every page, and no line for a page the business does not have.
        $paths = array_column($spec['pages'], 'path');

        expect([array_values(array_diff($paths, array_keys($design['pages']))), array_values(array_diff(array_keys($design['pages']), $paths))])
            ->toBe([[], []], "{$said} does not give every page a layout, or names a page the business does not have");

        foreach ($spec['pages'] as $page) {
            expect(in_array($design['pages'][$page['path']], Kit::layoutsFor($page, $design['direction']), true))
                ->toBeTrue("{$said} draws {$page['path']} in a layout the page or the direction does not take");
        }

        foreach ($design['variants'] as $component => $variant) {
            expect(isset($components[$component]))->toBeTrue("{$said} arranges {$component}, which is no kit component")
                ->and(isset($components[$component]['variants'][$variant]))->toBeTrue("{$said}: {$component} takes no {$variant}")
                ->and(in_array($component, [...array_keys($spec['prefabs']), 'site-header', 'hero', 'site-footer'], true))->toBeTrue("{$said} arranges a component its business does not place");
        }
    }
})->with(fn () => designedBusinesses());

it('draws every direction of its business, and no two designs the same way', function (string $business) {
    $designs = Kit::designs($business);

    expect(array_values(array_diff(array_keys(Kit::businesses()[$business]['directions']), array_column($designs, 'direction'))))
        ->toBe([], "{$business} lists a direction no design is drawn in");

    $drawn = array_map(fn (array $design): string => json_encode([$design['direction'], $design['palette'], $design['pages']]), $designs);

    expect($drawn)->toBe(array_values(array_unique($drawn)), "{$business} has two designs that differ only by their name");
})->with(fn () => designedBusinesses());
