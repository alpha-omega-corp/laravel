<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Vite;
use Workbench\App\Framework\Kit;
use Workbench\App\Framework\Picture;
use Workbench\App\Framework\Site;

use function Orchestra\Testbench\package_path;

/*
 * The framework tab's business views: one page of one kind of business, read
 * from the skill and drawn as a build would draw it. Held here end to end — the
 * content every business needs, every page of every design rendering with the
 * prefabs its business gives that page, and the tab's axes falling back to the
 * design's when a URL asks for what the skill would refuse.
 */

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
    Kit::forget();
});

/**
 * @return list<string>
 */
function drawnBusinesses(): array
{
    return array_keys(Kit::businesses());
}

it('has the content of every business: its site, a row for every prefab, words for every page', function (string $business) {
    $spec = Kit::businesses()[$business];
    $content = Site::content($business);

    expect($content)->not->toBeNull("workbench/content/{$business}.php is missing");

    foreach (['brand', 'blurb', 'address', 'phone', 'email', 'action'] as $key) {
        expect($content['site'][$key] ?? null)->not->toBeEmpty("{$business}'s site has no {$key}");
    }

    // The header's action leads to one of the business's own pages.
    expect(in_array($content['site']['action']['to'] ?? null, array_column($spec['pages'], 'path'), true))->toBeTrue("{$business}'s action leads to no page of its own");

    expect([array_values(array_diff(array_keys($spec['prefabs']), array_keys($content['prefabs']))), array_values(array_diff(array_keys($content['prefabs']), array_keys($spec['prefabs'])))])
        ->toBe([[], []], "{$business}'s content lacks a prefab its business lists, or has one it does not");

    foreach ($spec['pages'] as $page) {
        $words = $content['pages'][$page['path']] ?? null;

        expect($words)->not->toBeNull("{$business} has no words for {$page['path']}")
            ->and($words['hero']['title'] ?? null)->not->toBeEmpty("{$business}'s {$page['path']} has no title");

        // A page in the navigation is named in the site's own language.
        if ($page['label'] !== null) {
            expect($words['label'] ?? null)->not->toBeEmpty("{$business}'s {$page['path']} has no label of its own");
        }
    }

    // Every link by path leads to a page the business has.
    $paths = array_column($spec['pages'], 'path');

    array_walk_recursive($content, function (mixed $value, string|int $key) use ($paths, $business): void {
        if ($key === 'to') {
            expect(in_array($value, $paths, true))->toBeTrue("{$business} links to {$value}, which is no page of its own");
        }
    });
})->with(fn () => drawnBusinesses());

it('draws every page of every design, each prefab where its page has it', function (string $business) {
    $spec = Kit::businesses()[$business];

    foreach (Site::designs($business) as $design) {
        foreach ($spec['pages'] as $page) {
            $html = $this->get(route('framework.site', ['business' => $business, 'design' => $design['slug'], 'page' => $page['path']]))
                ->assertOk()
                ->getContent();

            $said = "{$business} · {$design['name']} · {$page['path']}";

            expect($html)
                ->toContain('data-direction="'.$design['direction'].'"')
                ->toContain('data-palette="'.$design['palette'].'"')
                ->toContain('data-framework-layout="'.$design['pages'][$page['path']].'"')
                ->toContain('data-kit="site-header"')
                ->toContain('data-kit="site-footer"');

            // One h1, as every page of a site has.
            expect(substr_count($html, '<h1'))->toBe(1, "{$said} has not exactly one h1");

            foreach ($page['prefabs'] as $prefab) {
                expect(str_contains($html, 'data-kit="'.$prefab.'"'))->toBeTrue("{$said} draws no {$prefab}");
            }

            foreach ($design['variants'] as $component => $variant) {
                if (str_contains($html, 'data-kit="'.$component.'"')) {
                    expect(preg_match('/data-kit="'.$component.'"\s+data-variant="'.$variant.'"/', $html))->toBe(1, "{$said} does not arrange its {$component}");
                }
            }
        }
    }
})->with(fn () => drawnBusinesses());

it('falls back to the design when the address asks for what the skill refuses', function () {
    $business = array_key_first(Site::businesses());
    $design = Site::designs($business)[0];

    $choice = Site::choose(['business' => $business, 'direction' => 'nowhere', 'palette' => 'nothing', 'layout' => 'console', 'page' => '/nope', 'design' => 'none']);

    expect($choice['direction'])->toBe($design['direction'])
        ->and($choice['palette'])->toBe($design['palette'])
        ->and($choice['page']['path'])->toBe('/')
        ->and($choice['layout'])->toBe($design['pages']['/'])
        ->and(array_filter($choice['chosen']))->toBe([]);

    // And an address says only what was overridden.
    expect(Site::query($choice))->toBe(['business' => $business, 'design' => $design['slug']]);
});

it('keeps an override the skill allows, and says so in the address', function () {
    $business = 'restaurant';
    $spec = Kit::businesses()[$business];
    $design = Site::designs($business)[0];
    $other = array_values(array_diff(array_keys($spec['directions']), [$design['direction']]))[0];

    $choice = Site::choose(['business' => $business, 'direction' => $other]);

    expect($choice['direction'])->toBe($other)
        ->and(array_keys(Kit::palettesFor($other)))->toContain($choice['palette'])
        ->and(Kit::layoutsFor($choice['page'], $other))->toContain($choice['layout'])
        ->and(Site::query($choice)['direction'])->toBe($other);
});

it('frames the page in the tab with every axis beside it and what a build pulls under it', function (string $business) {
    $design = Site::designs($business)[0];
    $html = $this->get(route('framework.businesses', ['business' => $business, 'design' => $design['slug']]))->assertOk()->getContent();

    expect($html)
        ->toContain('data-ref="framework.controls"')
        ->toContain('data-ref="framework.site"')
        ->toContain('data-ref="framework.pulls"')
        ->toContain(e(route('framework.site', ['business' => $business, 'design' => $design['slug'], 'embed' => 1])))
        ->toContain("businesses/{$business}.md")
        ->toContain("directions/{$design['direction']}.md")
        ->toContain("themes/{$design['palette']}.md");

    foreach (Site::designs($business) as $other) {
        expect($html)->toContain(e($other['name']));
    }
})->with(fn () => drawnBusinesses());

it('opens a business on a grid of every design, each a link that inspects it', function (string $business) {
    $html = $this->get(route('framework.businesses', ['business' => $business]))->assertOk()->getContent();
    $designs = Site::designs($business);

    // No design in the address: the grid, and no page inspected.
    expect($html)->toContain('data-ref="framework.variants"')
        ->not->toContain('data-ref="framework.site"')
        ->not->toContain('data-ref="framework.pulls"')
        ->and(substr_count($html, 'data-design="'))->toBe(count($designs));

    foreach ($designs as $design) {
        expect($html)->toContain('href="'.e(route('framework.businesses', ['business' => $business, 'design' => $design['slug']])).'"')
            ->toContain(e(route('framework.site', ['business' => $business, 'design' => $design['slug']])))
            ->toContain(e($design['name']));
    }

    // Inspecting one leads back to the grid.
    $inspected = $this->get(route('framework.businesses', ['business' => $business, 'design' => $designs[0]['slug']]))->assertOk()->getContent();

    expect($inspected)->toContain('data-ref="framework.site"')
        ->toContain('href="'.e(route('framework.businesses', ['business' => $business])).'"')
        ->not->toContain('data-ref="framework.variants"');
})->with(fn () => drawnBusinesses());

it('narrows the grid to one direction, and keeps the page it is drawn on', function () {
    $designs = Site::designs('software');
    $spec = array_values(array_filter($designs, fn (array $design): bool => $design['direction'] === 'spec'));

    $html = $this->get(route('framework.businesses', ['business' => 'software', 'direction' => 'spec', 'page' => '/pricing']))->assertOk()->getContent();

    expect(substr_count($html, 'data-design="'))->toBe(count($spec))
        ->and($spec)->not->toBeEmpty();

    foreach ($spec as $design) {
        expect($html)->toContain('href="'.e(route('framework.businesses', ['business' => 'software', 'design' => $design['slug'], 'page' => '/pricing'])).'"');
    }
});

it('lays every design out on the contact sheet, and every business on its index', function () {
    $index = $this->get(route('framework.sheet'))->assertOk()->getContent();

    foreach (drawnBusinesses() as $business) {
        expect($index)->toContain(e(route('framework.sheet', ['business' => $business])));

        $sheet = $this->get(route('framework.sheet', ['business' => $business]))->assertOk()->getContent();
        $views = Site::views($business) + array_sum(array_map('count', Site::rolls($business)));

        expect(substr_count($sheet, '<iframe'))->toBe($views);
    }
});

it('has dozens of views for every business', function (string $business) {
    expect(Site::views($business) + array_sum(array_map('count', Site::rolls($business))))->toBeGreaterThanOrEqual(12);
})->with(fn () => drawnBusinesses());

it('reads the site layouts off the worker\'s stubs, region for region', function () {
    foreach (Kit::layouts() as $name => $layout) {
        if ($layout['family'] !== 'site') {
            continue;
        }

        $view = (string) file_get_contents(package_path("workbench/resources/views/framework/site/layouts/{$name}.blade.php"));
        preg_match_all("/\\\$regions\['([a-z-]+)'\]/", $view, $drawn);

        sort($drawn[1]);
        $regions = array_keys($layout['regions']);
        sort($regions);

        expect($drawn[1])->toBe($regions, "framework/site/layouts/{$name} and layouts/{$name}.md name different regions");
    }
});

it('frames the photograph a demo business has not got, captioned with what belongs there', function () {
    $response = $this->get(route('framework.picture', ['subject' => 'La salle dressée pour un mariage']))->assertOk();

    expect($response->headers->get('Content-Type'))->toStartWith('image/svg+xml')
        ->and($response->getContent())->toContain('<svg')->toContain('La salle dressée pour un mariage')
        ->not->toContain('<script');

    // Words a content file writes are never markup in the picture.
    expect($this->get(route('framework.picture', ['subject' => '<script>alert(1)</script>']))->getContent())->not->toContain('<script>');

    expect(Picture::resolve(['pictures' => [['image' => 'picture:Le quai', 'alt' => 'Le quai']]]))
        ->toBe(['pictures' => [['image' => route('framework.picture', ['subject' => 'Le quai']), 'alt' => 'Le quai']]]);
});
