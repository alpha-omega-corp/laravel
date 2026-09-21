<?php

declare(strict_types=1);

use App\Enums\KitComponent;
use App\Enums\KitLayout;
use App\Enums\Project;
use App\Enums\Theme;
use App\Enums\Variation;
use App\Support\DesignGraph;
use Illuminate\Support\Facades\Vite;

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

it('serves the graph from the main navigation', function () {
    $html = $this->get(route('graph'))->assertOk()->getContent();

    expect($html)->toContain(__('graph.title'))
        ->and($html)->toContain(__('graph.intro'))
        ->and($html)->toContain('<svg');

    // The tab is in the shell's bar, on every page and not only this one.
    expect($this->get(route('home'))->getContent())
        ->toContain('href="'.e(route('graph')).'"')
        ->toContain(__('shell.nav.graph'));
});

it('holds one node for every case of every enum it draws', function () {
    $nodes = DesignGraph::nodes();

    expect(array_keys($nodes))->toBe(DesignGraph::kinds())
        ->and($nodes[DesignGraph::COMPONENT])->toHaveCount(count(KitComponent::cases()))
        ->and($nodes[DesignGraph::LAYOUT])->toHaveCount(count(KitLayout::cases()))
        ->and($nodes[DesignGraph::PROJECT])->toHaveCount(count(Project::cases()))
        ->and($nodes[DesignGraph::PALETTE])->toHaveCount(count(Theme::cases()))
        ->and($nodes[DesignGraph::DEGREE])->toHaveCount(count(Variation::cases()));

    $ids = array_column(array_merge(...array_values($nodes)), 'id');

    expect($ids)->toHaveCount(count(array_unique($ids)));
});

it('maps every node to a route that serves it', function () {
    $nodes = array_merge(...array_values(DesignGraph::nodes()));
    $html = $this->get(route('graph'))->assertOk()->getContent();

    foreach ($nodes as $node) {
        expect($node['href'])->toStartWith(url('/'))
            ->and($html)->toContain('href="'.e($node['href']).'"');
    }

    // A component points at its own section of the kit; everything else points
    // at the framework with that axis already chosen.
    expect(DesignGraph::nodes()[DesignGraph::COMPONENT][0]['href'])->toBe(route('ui-kit').'#'.KitComponent::cases()[0]->value);

    $this->get(route('ui-kit'))->assertOk();
    $this->get(route('framework', ['layout' => 'console']))->assertOk()
        ->assertSee('data-ref="framework.layouts.console"', false);
    $this->get(route('framework', ['theme' => 'vellum']))->assertOk()
        ->assertSee('data-palette="vellum"', false);
});

it('joins every edge to two nodes it actually has', function () {
    $ids = array_column(array_merge(...array_values(DesignGraph::nodes())), 'id');
    $edges = DesignGraph::edges();

    expect($edges)->not->toBeEmpty();

    foreach ($edges as $edge) {
        expect($ids)->toContain($edge['from'])
            ->and($ids)->toContain($edge['to'])
            ->and($edge['kind'])->toBeIn(['uses', 'exposes']);

        // A layout uses; a degree exposes. Nothing else is an origin.
        expect($edge['from'])->toStartWith($edge['kind'] === 'uses'
            ? DesignGraph::LAYOUT.':'
            : DesignGraph::DEGREE.':');
    }
});

it('reads the component edges out of the views rather than a written list', function () {
    // The console draws its own sidebar and breadcrumb, and the price list it
    // wraps becomes a table — all three are in its blade sources, so all three
    // are edges. The marketing layout has no sidebar anywhere under it.
    expect(DesignGraph::componentsFor(KitLayout::Console))
        ->toContain('side-nav')
        ->toContain('breadcrumb')
        ->toContain('table')
        ->and(DesignGraph::componentsFor(KitLayout::Marketing))
        ->toContain('navbar')
        ->not->toContain('side-nav');

    // The other half of reading it out of the views: a component no framework
    // view writes gets no edge at all. Twelve of the thirty-eight are in that
    // position, and drawing them joined to something would be a lie.
    $used = [];

    foreach (KitLayout::cases() as $layout) {
        $used = array_merge($used, DesignGraph::componentsFor($layout));
    }

    expect(array_unique($used))->not->toContain('modal')
        ->not->toContain('sign-in')
        ->not->toContain('command-palette');

    // Every named component is a real case of the enum.
    foreach (KitLayout::cases() as $layout) {
        foreach (DesignGraph::componentsFor($layout) as $component) {
            expect(KitComponent::tryFrom($component))->not->toBeNull();
        }
    }
});

it('hangs the projects, the palette and the degree off the layout that owns them', function () {
    foreach (KitLayout::cases() as $layout) {
        $edges = array_filter(DesignGraph::edges(), fn (array $edge): bool => $edge['from'] === DesignGraph::LAYOUT.':'.$layout->value);
        $to = array_column($edges, 'to');

        expect($to)->toContain(DesignGraph::PALETTE.':'.$layout->palette()->value)
            ->and($to)->toContain(DesignGraph::DEGREE.':'.$layout->variation()->value);
    }

    // Stacked is the one layout every project declares a section in; the farm
    // is the only project with a workspace section besides the butcher.
    expect(DesignGraph::projectsFor(KitLayout::Stacked))->toHaveCount(count(Project::cases()))
        ->and(DesignGraph::projectsFor(KitLayout::Workspace))->toContain('farm', 'butcher');
});

it('leaves a palette nothing is pinned to without an edge, and says so', function () {
    $pinned = array_map(fn (KitLayout $layout): string => $layout->palette()->value, KitLayout::cases());
    $loose = array_values(array_diff(array_column(Theme::cases(), 'value'), $pinned));

    // Seven palettes, five layouts: two are nobody's fitting pairing.
    expect($loose)->toBe(['blossom', 'vellum']);

    $to = array_column(DesignGraph::edges(), 'to');

    foreach ($loose as $palette) {
        expect($to)->not->toContain(DesignGraph::PALETTE.':'.$palette);
    }

    // And the page explains the empty node rather than hiding it.
    expect($this->get(route('graph'))->getContent())->toContain(__('graph.note'));
});

it('names the page and every kind in every locale', function (string $locale) {
    app()->setLocale($locale);

    expect(__('graph.title'))->not->toContain('graph.')
        ->and(__('graph.intro'))->not->toContain('graph.')
        ->and(__('graph.legend'))->not->toContain('graph.')
        ->and(__('graph.note'))->not->toContain('graph.')
        ->and(__('shell.nav.graph'))->not->toContain('shell.nav');

    foreach (DesignGraph::kinds() as $kind) {
        expect(__('graph.kind.'.$kind))->not->toContain('graph.kind');
    }
})->with(['fr', 'de', 'it', 'en']);

it('joins a degree to the components it exposes', function () {
    /*
     * A degree is not only something a layout prefers: it switches components
     * on. The exposure is read from the `$variation->` guards in the section
     * sources, both sides of them — which is why plain is not simply the
     * absence of the other two.
     */
    $exposures = DesignGraph::exposures();

    expect(array_keys($exposures))->toBe(array_column(Variation::cases(), 'value'))
        ->and($exposures['standard'])->toContain('badge')
        ->and($exposures['rich'])->toContain('badge')
        ->and($exposures['plain'])->not->toContain('badge');

    // Plain exposes the salon catalogue's fallback list, which it alone draws.
    expect($exposures['plain'])->toContain('stacked-list');

    // Every exposure is a real component node, and reaches it by a real edge.
    $ids = array_column(array_merge(...array_values(DesignGraph::nodes())), 'id');

    foreach ($exposures as $degree => $components) {
        foreach ($components as $component) {
            expect($ids)->toContain(DesignGraph::COMPONENT.':'.$component)
                ->and(DesignGraph::edges())->toContain([
                    'from' => DesignGraph::DEGREE.':'.$degree,
                    'to' => DesignGraph::COMPONENT.':'.$component,
                    'kind' => 'exposes',
                ]);
        }
    }
});

it('draws the exposures apart from the rest', function () {
    $html = $this->get(route('graph'))->assertOk()->getContent();

    // Dashed and accent, so an exposure is not read as a layout using something.
    expect(array_filter(DesignGraph::edges(), fn (array $edge): bool => $edge['kind'] === 'exposes'))
        ->not->toBeEmpty()
        ->and($html)->toContain('stroke-dasharray="4 3"')
        ->and($html)->toContain('stroke-accent')
        ->and($html)->toContain(__('graph.exposure'));

    // One path per exposure, all three degrees'.
    $dashed = (string) str($html)->after('stroke-dasharray="4 3"')->before('</g>');

    expect(substr_count($dashed, '<path'))
        ->toBe(count(array_filter(DesignGraph::edges(), fn (array $edge): bool => $edge['kind'] === 'exposes')));
});
