<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Vite;
use Workbench\App\Framework\Kit;
use Workbench\App\Framework\Prompt;
use Workbench\App\Framework\Site;

/*
 * The design inspected on the framework tab, written as deployer's
 * Hallucinator takes it. deployer reads these lines back field by field
 * (`sitebuild::framework`), so the labels, the values and the ceilings are
 * held here as deployer holds them there.
 */

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
    Kit::forget();
});

it('writes every design of every business as the fields of deployer\'s form, each within its ceiling', function (string $business) {
    foreach (Site::designs($business) as $design) {
        $choice = Site::choose(['business' => $business, 'design' => $design['slug']]);
        $fields = Prompt::fields($choice);
        $where = "{$business} · {$design['name']}";

        expect($fields['Business'])->toBe($business, $where)
            ->and($fields['Direction'])->toBe($choice['direction'], $where)
            ->and($fields['Theme'])->toBe($choice['palette'], $where)
            ->and($fields['Layout'])->toBe(Prompt::layouts($choice)['/'] ?? $fields['Layout'], $where)
            ->and($fields['Brief'] ?? '')->not->toBeEmpty($where)
            ->and($fields['Look'])->toContain("The {$design['name']} design of the ui-kit skill's designs/{$business}.md");

        expect(strlen($fields['Brief']))->toBeLessThanOrEqual(Prompt::BRIEF, $where);

        foreach (['Pages', 'Look'] as $part) {
            expect(strlen($fields[$part] ?? ''))->toBeLessThanOrEqual(Prompt::PART, "{$where}: {$part}");
        }

        foreach (['Business words', 'Direction words'] as $words) {
            expect(strlen($fields[$words] ?? ''))->toBeLessThanOrEqual(Prompt::WORDS, "{$where}: {$words}");
        }

        // Every value is one line, so deployer reads a line a field.
        foreach ($fields as $label => $value) {
            expect($value)->not->toContain("\n", "{$where}: {$label}");
        }

        // A page the design names is in its own layout, unless the direction does not take it.
        foreach ($choice['business']['pages'] as $page) {
            $fits = Kit::layoutsFor($page, $choice['direction']) ?: $page['layouts'];

            expect(in_array(Prompt::layouts($choice)[$page['path']], $fits, true))->toBeTrue("{$where}: {$page['path']}");
        }
    }
})->with(fn () => array_keys(Site::businesses()));

it('says what the viewer changed of the design, and the layout of the page they changed', function () {
    $design = Site::designs('bakery')[0];
    $choice = Site::choose(['business' => 'bakery', 'design' => $design['slug'], 'scheme' => 'dark']);
    $fields = Prompt::fields($choice);

    expect($fields['Look'])->toContain('with its own scheme instead of the design\'s')
        ->and($fields['Look'])->toContain('Dark scheme.');

    $page = collect($choice['business']['pages'])->first(fn (array $page): bool => count(Kit::layoutsFor($page, $design['direction'])) > 1);
    $other = collect(Kit::layoutsFor($page, $design['direction']))->first(fn (string $layout): bool => $layout !== ($design['pages'][$page['path']] ?? null));
    $changed = Site::choose(['business' => 'bakery', 'design' => $design['slug'], 'page' => $page['path'], 'layout' => $other]);

    expect(Prompt::layouts($changed)[$page['path']])->toBe($other)
        ->and(Prompt::fields($changed)['Pages'])->toContain("{$page['path']} (")
        ->and(Prompt::fields($changed)['Look'])->toContain("{$page['path']} in the {$other} layout");
});

it('opens the prompt from the inspected design, and not from the grid', function () {
    $design = Site::designs('bakery')[0];
    $choice = Site::choose(['business' => 'bakery', 'design' => $design['slug']]);

    $this->get(route('framework.businesses', ['business' => 'bakery', 'design' => $design['slug']]))
        ->assertOk()
        ->assertSee('data-framework-prompt="framework-prompt"', false)
        ->assertSee('<dialog id="framework-prompt"', false)
        ->assertSee(e(Prompt::text($choice)), false);

    $this->get(route('framework.businesses', ['business' => 'bakery']))
        ->assertOk()
        ->assertDontSee('data-framework-prompt=', false);
});

it('opens what a build pulls on the prompt, the first of its tabs, and keeps every part of the kit in the others', function () {
    $design = Site::designs('bakery')[0];
    $choice = Site::choose(['business' => 'bakery', 'design' => $design['slug']]);

    $html = $this->get(route('framework.businesses', ['business' => 'bakery', 'design' => $design['slug']]))
        ->assertOk()
        ->assertSee('data-framework-tabs', false)
        ->assertSeeInOrder(['data-framework-tab="prompt"', 'data-framework-tab="regions"', 'data-framework-tab="direction"', 'data-framework-tab="palette"', 'data-framework-tab="files"'], false)
        ->getContent();

    // The prompt is shown and selected; every other panel is there, hidden until its tab is chosen.
    expect($html)->toMatch('/id="pulls-tab-prompt"[^>]*aria-selected="true"/')
        ->and($html)->toMatch('/<section role="tabpanel" id="pulls-prompt"(?![^>]*hidden)[^>]*>/')
        ->and($html)->toMatch('/<section role="tabpanel" id="pulls-regions"[^>]*hidden/')
        ->and(substr_count($html, e(Prompt::text($choice))))->toBe(2);
});
