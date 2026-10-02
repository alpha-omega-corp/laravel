<?php

declare(strict_types=1);

use function Orchestra\Testbench\package_path;

/*
 * `## Pages` in businesses/<name>.md: the pages a site of that kind has, which
 * deployer's site factory proposes before anything is built. Held against the
 * rest of the skill — the business's own prefabs and directions, the layouts
 * those directions are drawn in — so that whichever direction a site is rolled
 * in, every page it proposes can be drawn, and every prefab has a page.
 */

/**
 * @return array<string, string> business name to its spec
 */
function businessSpecs(): array
{
    $specs = [];

    foreach (glob(package_path('.claude/skills/ui-kit/businesses/*.md')) ?: [] as $path) {
        if (basename($path) !== 'README.md') {
            $specs[basename($path, '.md')] = (string) file_get_contents($path);
        }
    }

    return $specs;
}

/**
 * Each `- <path> — <role>: <layout> | …[; <prefab>, …][ — <label>]` line, or null
 * for one that is not.
 *
 * @return list<array{path: string, role: string, layouts: list<string>, prefabs: list<string>, label: ?string}|null>
 */
function businessPages(string $spec): array
{
    return array_map(function (string $line): ?array {
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
    }, specSection($spec, 'Pages'));
}

it('gives a business its pages, home first and five at most', function (string $business) {
    $pages = businessPages(businessSpecs()[$business]);

    expect($pages)->not->toBeEmpty("{$business} has no pages")
        ->and(count($pages))->toBeLessThanOrEqual(5)
        ->and($pages)->not->toContain(null);

    $paths = array_column($pages, 'path');

    expect($pages[0]['path'])->toBe('/')
        ->and($pages[0]['role'])->toBe('home')
        ->and($paths)->toBe(array_values(array_unique($paths)));
})->with(fn () => array_keys(businessSpecs()));

it('draws every page in a site layout that each of its business\'s directions is drawn in', function (string $business) {
    $spec = businessSpecs()[$business];

    foreach (array_filter(businessPages($spec)) as $page) {
        foreach ($page['layouts'] as $layout) {
            $path = package_path(".claude/skills/ui-kit/layouts/{$layout}.md");

            expect($path)->toBeFile("{$business}'s {$page['path']} names a layout there is none of: {$layout}")
                ->and(trim(specSection((string) file_get_contents($path), 'Family')[0] ?? '', '`'))->toBe('site', "{$business}'s {$page['path']} is drawn in {$layout}, which is not a site layout");
        }

        foreach (array_keys(specItems($spec, 'Directions')) as $direction) {
            $drawnIn = array_keys(specItems((string) file_get_contents(package_path(".claude/skills/ui-kit/directions/{$direction}.md")), 'Layouts'));

            expect(array_intersect($page['layouts'], $drawnIn))->not->toBeEmpty("{$business}'s {$page['path']} cannot be drawn in {$direction}");
        }
    }
})->with(fn () => array_keys(businessSpecs()));

it('puts every prefab of its business on some page, and a list on exactly one', function (string $business) {
    $spec = businessSpecs()[$business];
    $prefabs = array_keys(specItems($spec, 'Prefabs'));
    $placed = array_merge(...array_map(fn (array $page): array => $page['prefabs'], array_filter(businessPages($spec))));

    expect(array_values(array_diff($placed, $prefabs)))->toBe([], "{$business} places a prefab it does not list")
        ->and(array_values(array_diff($prefabs, $placed)))->toBe([], "{$business} has a prefab no page holds");

    $counts = array_count_values($placed);

    foreach (array_intersect(['menu', 'catalogue'], $prefabs) as $list) {
        expect($counts[$list])->toBe(1, "{$business}'s {$list} is a list, and a list has one page");
    }

    foreach (array_filter(businessPages($spec)) as $page) {
        expect($page['prefabs'])->toBe(array_values(array_unique($page['prefabs'])));
    }
})->with(fn () => array_keys(businessSpecs()));
