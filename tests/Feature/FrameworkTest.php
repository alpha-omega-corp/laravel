<?php

declare(strict_types=1);

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Vite;
use Workbench\App\Enums\KitLayout;
use Workbench\App\Enums\Project;
use Workbench\App\Enums\Theme;
use Workbench\App\Enums\Variation;

use function Orchestra\Testbench\package_path;

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

/**
 * The URL of one project and section, plus whichever axes the viewer has
 * overridden — the same rule the page itself builds its links by, so a null
 * really is an absent parameter and not a default spelled out.
 */
function framework(Project $project, string $key, ?Theme $theme = null, ?KitLayout $layout = null, ?Variation $variation = null): string
{
    return route('framework', array_filter([
        'project' => $project->value,
        'theme' => $theme?->value,
        'layout' => $layout?->value,
        'variation' => $variation?->value,
        'screen' => $key,
    ], fn (?string $value): bool => $value !== null));
}

/**
 * The mock site alone: everything below the marker the preview container
 * carries. The page's own four rows of controls sit above it and are built
 * from the very same URLs, so counting the whole document would count them as
 * the site's navigation.
 */
function mockSite(string $html): string
{
    return (string) str($html)->after('data-ref="framework.layouts.');
}

/**
 * The mock site without its breadcrumb, which is a trail back to the root
 * rather than a second navigation and so does not count as one.
 */
function withoutBreadcrumb(string $site): string
{
    return (string) preg_replace('#<nav data-ref="&lt;x-kit\.breadcrumb /&gt;".*?</nav>#s', '', $site);
}

it('puts every axis in one navigation above the framework', function () {
    $html = $this->get(route('framework'))->assertOk()->getContent();

    // One block, one row per axis, and no rail anywhere: the page's own two
    // side navigations are gone, so the only one left is the mock site's.
    expect(substr_count($html, 'data-ref="&lt;x-kit.tabs variant=&quot;pill&quot; /&gt;"'))->toBe(4)
        ->and(substr_count($html, 'data-ref="&lt;x-kit.side-nav'))->toBe(0)
        ->and($html)->toContain(__('framework.projects'))
        ->and($html)->toContain(__('framework.palettes'))
        ->and($html)->toContain(__('framework.layouts'))
        ->and($html)->toContain(__('framework.variations'));

    foreach (Project::cases() as $project) {
        expect($html)->toContain('href="'.e(framework($project, $project->keys()[0])).'"')
            ->and($html)->toContain($project->label());
    }

    $opening = Project::default()->keys()[0];

    foreach (Theme::cases() as $palette) {
        expect($html)->toContain('href="'.e(framework(Project::default(), $opening, $palette)).'"')
            ->and($html)->toContain($palette->label());
    }

    foreach (KitLayout::cases() as $layout) {
        expect($html)->toContain('href="'.e(framework(Project::default(), $opening, layout: $layout)).'"')
            ->and($html)->toContain($layout->label());
    }

    foreach (Variation::cases() as $degree) {
        expect($html)->toContain('href="'.e(framework(Project::default(), $opening, variation: $degree)).'"')
            ->and($html)->toContain($degree->label());
    }
});

it('builds no two projects the same way', function () {
    // The complaint this tab answers: nine businesses in one set of clothes is
    // one business. So neither the set of sections nor the set of bodies they
    // are drawn with may repeat between two projects.
    $slugs = [];
    $bodies = [];

    foreach (Project::cases() as $project) {
        $sections = $project->sections();

        $slugs[$project->value] = array_keys($sections);
        $bodies[$project->value] = array_column($sections, 'view');
    }

    expect(array_map('serialize', $slugs))->toHaveCount(count(array_unique(array_map('serialize', $slugs))))
        ->and(array_map('serialize', $bodies))->toHaveCount(count(array_unique(array_map('serialize', $bodies))));

    // And a section body is a real file, shared only where two trades really do
    // the same thing.
    $used = array_unique(array_merge(...array_values($bodies)));

    expect($used)->toHaveCount(11);

    foreach ($used as $view) {
        expect(view()->exists($view))->toBeTrue();
    }
});

it('gives a trade the section its own trade needs and no other', function () {
    // Named in the round: a menu is the restaurant's, a catalogue of pictures is
    // the salon's, a shop and a diary are the farm's.
    $view = fn (Project $project, string $key): string => $project->sections()[$key]['view'];

    expect($view(Project::Restaurant, 'carte'))->toBe('framework.sections.menu')
        ->and($view(Project::Haircut, 'galerie'))->toBe('framework.sections.gallery')
        ->and($view(Project::Farm, 'boutique'))->toBe('framework.sections.catalogue')
        ->and($view(Project::Farm, 'evenements'))->toBe('framework.sections.agenda')
        ->and($view(Project::Logistics, 'tournees'))->toBe('framework.sections.dashboard');

    // The menu is the restaurant's alone, and the salon has no opening hours.
    foreach (Project::cases() as $project) {
        $bodies = array_column($project->sections(), 'view');

        expect(in_array('framework.sections.menu', $bodies, true))->toBe($project === Project::Restaurant);
    }

    expect(Project::Haircut->has('horaires'))->toBeFalse()
        ->and(Project::Restaurant->has('rendez-vous'))->toBeFalse()
        ->and(Project::Logistics->has('accueil'))->toBeFalse();
});

it('gives every section the layout chosen for the work it is', function () {
    // The premise of the tab: a counter is a console, a brochure page is not.
    foreach (Project::cases() as $project) {
        foreach ($project->sections() as $key => $section) {
            $html = $this->get(framework($project, $key))->assertOk()->getContent();

            expect($html)->toContain('data-ref="framework.layouts.'.$section['layout']->value.'"');
        }
    }

    // Walking one project therefore re-dresses the card as the work changes.
    expect(Project::Restaurant->section('accueil')['layout'])->toBe(KitLayout::Marketing)
        ->and(Project::Restaurant->section('horaires')['layout'])->toBe(KitLayout::Stacked)
        ->and(Project::Butcher->section('etal')['layout'])->toBe(KitLayout::Console);
});

it('draws every section on both sides of the dense line', function () {
    // A body has two shapes — the one a public page gets and the one a back
    // office gets — and only one of them is reached by the layout its project
    // chose. Walking both catches a key that only the other branch reads.
    foreach (Project::cases() as $project) {
        foreach (array_keys($project->sections()) as $key) {
            $this->get(framework($project, $key, layout: KitLayout::Console))->assertOk();
            $this->get(framework($project, $key, layout: KitLayout::Marketing))->assertOk();
        }
    }
});

it('uses all five layouts across the projects', function () {
    $used = [];

    foreach (Project::cases() as $project) {
        $used = array_merge($used, array_column($project->sections(), 'layout'));
    }

    foreach (KitLayout::cases() as $layout) {
        expect($used)->toContain($layout);
    }
});

it('points every call to action at a section the project actually has', function (Project $project) {
    $site = $project->site();

    expect($project->has($site['cta']['primary']['to']))->toBeTrue()
        ->and($project->has($site['cta']['secondary']['to']))->toBeTrue();
})->with(Project::cases());

it('dresses the fitting layout in the palette and the degree its own spec rates best', function () {
    // Butcher's counter is a console: graphite, and plain because a back office
    // has no room for a hero.
    $html = $this->get(framework(Project::Butcher, 'etal'))->assertOk()->getContent();

    expect(KitLayout::Console->palette())->toBe(Theme::Graphite)
        ->and(KitLayout::Console->variation())->toBe(Variation::Plain)
        ->and($html)->toContain('data-palette="graphite"')
        ->and($html)->toContain('data-variation="plain"');

    // Until the viewer names one, and then it is theirs.
    $html = $this->get(framework(Project::Butcher, 'etal', Theme::Vellum, variation: Variation::Rich))->assertOk()->getContent();

    expect($html)->toContain('data-palette="vellum"')
        ->and($html)->toContain('data-variation="rich"');
});

it('pins each layout to a palette its own spec rates best', function (KitLayout $layout) {
    $spec = package_path('.claude/skills/ui-kit/themes/'.$layout->palette()->value.'.md');

    expect($spec)->toBeFile()
        ->and(file_get_contents($spec))->toContain('- '.$layout->value.' — best');
})->with(KitLayout::cases());

it('turns the degree into what is actually drawn', function () {
    // The degree is not a class name on a wrapper: it decides whether the
    // pictures, the ornaments and the air between blocks exist at all.
    $of = fn (Variation $degree): string => $this->get(
        framework(Project::Haircut, 'galerie', variation: $degree)
    )->assertOk()->getContent();

    // The salon's catalogue is pictures, so plain falls back to the captions.
    expect($of(Variation::Rich))->toContain('aspect-square')
        ->and($of(Variation::Standard))->toContain('aspect-square')
        ->and($of(Variation::Plain))->not->toContain('aspect-square')
        ->and($of(Variation::Plain))->toContain('Carré long, frange rideau');

    // And the rhythm between a section's blocks is the dial too.
    expect($of(Variation::Plain))->toContain(Variation::Plain->rhythm())
        ->and($of(Variation::Rich))->toContain(Variation::Rich->rhythm());

    // A degree the layout did not ask for is an override, and says so in the URL.
    $html = $this->get(route('framework'))->assertOk()->getContent();

    expect($html)->toContain('href="'.e(framework(Project::default(), 'accueil', variation: Variation::Plain)).'"');
});

it('keeps an unchosen axis out of the URL, and offers a row that puts it back', function () {
    $html = $this->get(route('framework'))->assertOk()->getContent();

    // Nothing is overridden, so the rails' first row is the current one and the
    // links out of it carry no layout, theme or degree at all.
    expect($html)->toContain(__('framework.fitting'))
        ->and($html)->toContain('href="'.e(framework(Project::default(), 'accueil')).'"');

    // Override the layout and the row that drops it again appears, still
    // pointing at a URL without one.
    $html = $this->get(framework(Project::default(), 'accueil', layout: KitLayout::Console))
        ->assertOk()->getContent();

    expect($html)->toContain('data-ref="framework.layouts.console"')
        ->and($html)->toContain('href="'.e(framework(Project::default(), 'accueil')).'"');
});

it('carries a project’s own navigation and nothing of another’s', function () {
    foreach (Project::cases() as $project) {
        $html = $this->get(framework($project, $project->keys()[0]))->assertOk()->getContent();

        // Escaped, because one of the nine is an ampersand away from a bad match.
        expect($html)->toContain(e($project->site()['brand']));

        foreach ($project->sections() as $key => $section) {
            expect($html)->toContain('href="'.e(framework($project, $key)).'"')
                ->and($html)->toContain(e($section['label']));
        }
    }
});

it('falls back to the project’s first section when the query names one it does not have', function () {
    $html = $this->get(route('framework', ['project' => 'haircut', 'screen' => 'horaires']))->assertOk()->getContent();

    expect($html)->toContain('Atelier Nord')
        ->and($html)->toContain(Project::Haircut->section('salon')['data']['title']);
});

it('keeps the section across a project switch only when the other project has it', function () {
    // The butcher and the restaurant both open on a home page, so the link keeps it.
    $html = $this->get(framework(Project::Restaurant, 'accueil'))->assertOk()->getContent();

    expect($html)->toContain('href="'.e(framework(Project::Butcher, 'accueil')).'"');

    // The carrier has no home page at all, so its link lands on its own first.
    expect($html)->toContain('href="'.e(framework(Project::Logistics, 'tournees')).'"');
});

it('holds the framework in one card', function () {
    $html = $this->get(route('framework'))->assertOk()->getContent();

    // The heading and the framework share a panel, and the framework brings no
    // second frame of its own inside it.
    expect($html)->toMatch('/class="panel overflow-hidden">\s*<header/')
        ->and($html)->toContain('data-ref="framework.layouts.marketing"')
        ->and($html)->not->toContain('rounded-panel border border-rule bg-canvas font-body');
});

it('draws the same section drastically differently in each layout', function () {
    $of = fn (KitLayout $layout): string => $this->get(
        framework(Project::Restaurant, 'carte', layout: $layout)
    )->assertOk()->getContent();

    // The chrome: a sidebar and a breadcrumb only in the console, no page
    // header at all in the workspace, a footer only on the public layouts.
    // The page itself no longer draws a side-nav, so this counts the mock site's.
    $sidebars = fn (KitLayout $layout): int => substr_count($of($layout), 'data-ref="&lt;x-kit.side-nav');

    expect($sidebars(KitLayout::Console))->toBe(1)
        ->and($sidebars(KitLayout::Marketing))->toBe(0)
        ->and($of(KitLayout::Console))->toContain('data-ref="&lt;x-kit.breadcrumb /&gt;"')
        ->and($of(KitLayout::Workspace))->not->toContain('data-ref="&lt;x-kit.page-heading /&gt;"')
        ->and($of(KitLayout::Marketing))->toContain('Rue du Port 12, 1006 Lausanne · 021 000 00 00')
        ->and($of(KitLayout::Focus))->not->toContain('Rue du Port 12, 1006 Lausanne · 021 000 00 00');

    // And the content: the dense layouts give up the printed card for a table.
    expect($of(KitLayout::Console))->toContain('data-ref="&lt;x-kit.table /&gt;"')
        ->and($of(KitLayout::Marketing))->not->toContain('data-ref="&lt;x-kit.table /&gt;"');

    // Focus counts the project's own sections as steps; nothing else does.
    expect($of(KitLayout::Focus))->toContain('Étape 2 sur 4')
        ->and($of(KitLayout::Stacked))->not->toContain('Étape 2 sur 4');
});

it('counts the steps of the project it is showing, not a fixed four', function () {
    $html = $this->get(framework(Project::Haircut, 'rendez-vous'))->assertOk()->getContent();

    // The salon's appointment screen is a focus layout by choice, not by query,
    // and it is the fifth of the five sections the salon is built from.
    expect($html)->toContain('data-ref="framework.layouts.focus"')
        ->and($html)->toContain('Étape 5 sur 5');
});

it('renders one section in one container, not every pairing at once', function () {
    $html = $this->get(framework(Project::Butcher, 'etal', Theme::Vellum, KitLayout::Stacked))
        ->assertOk()->getContent();

    expect(preg_match_all('/data-palette="([a-z]+)"\s+data-ref="framework\./', $html, $matches))->toBe(1)
        ->and($matches[1][0])->toBe('vellum')
        ->and($html)->toContain('data-ref="framework.layouts.stacked"')
        ->and($html)->not->toContain('data-ref="framework.layouts.console"');
});

it('scrolls the container rather than the page', function () {
    $html = $this->get(route('framework'))->assertOk()->getContent();

    expect($html)->toContain('h-[calc(100dvh-36rem)]')
        ->and($html)->toContain('overflow-y-auto')
        ->and($html)->toContain('resize-y');
});

it('falls back to the fitting set when the query names nothing real', function () {
    $html = $this->get(route('framework', ['project' => 'brewery', 'theme' => 'chartreuse', 'layout' => 'origami', 'variation' => 'baroque', 'screen' => 'cellar']))
        ->assertOk()->getContent();

    $fitting = Project::default()->section(null)['layout'];

    expect($html)->toContain('data-ref="framework.layouts.'.$fitting->value.'"')
        ->and($html)->toContain('data-palette="'.$fitting->palette()->value.'"')
        ->and($html)->toContain('data-variation="'.$fitting->variation()->value.'"')
        ->and($html)->toContain(e(Project::default()->site()['brand']));
});

it('offers no phone preview, because the framework is itself the preview', function () {
    $url = framework(Project::Cabinet, 'contact', Theme::Harbour, KitLayout::Console, Variation::Rich);
    $html = $this->get($url)->assertOk()->getContent();

    // No view switch, no frame, no iframe — this page does not go through the
    // gallery layout at all. The other two galleries keep theirs; GalleryViewTest
    // is what holds them to it.
    expect($html)->not->toContain('<iframe')
        ->and($html)->not->toContain('view=mobile')
        ->and($html)->not->toContain('w-[390px]');

    // The chosen pairing still arrives, which is what the preview was for.
    expect($html)->toContain('data-palette="harbour"')
        ->and($html)->toContain('data-variation="rich"')
        ->and($html)->toContain('name="contact-email"');
});

it('drives the top tabs from inside the mock site', function () {
    $html = $this->get(framework(Project::Farm, 'accueil'))->assertOk()->getContent();

    // The bar, the footer and the buttons of the home section all address the
    // framework's own URLs rather than an anchor on the page.
    foreach (Project::Farm->keys() as $key) {
        expect($html)->toContain('href="'.e(framework(Project::Farm, $key)).'"');
    }

    expect($html)->not->toContain('href="#contact"');
});

it('holds the menu, the pictures, the diary and the forms the trades need', function () {
    expect($this->get(framework(Project::Restaurant, 'carte'))->getContent())
        ->toContain('Filet de perche, beurre citronné, pommes vapeur')
        ->toContain('34.—');

    expect($this->get(framework(Project::Haircut, 'galerie'))->getContent())
        ->toContain('Balayage miel sur base châtain');

    expect($this->get(framework(Project::Butcher, 'arrivages'))->getContent())
        ->toContain('Génisse d’Hérens');

    expect($this->get(framework(Project::Farm, 'boutique'))->getContent())
        ->toContain('Panier familial')
        ->toContain('29.—');

    // The school's course list is a workspace, so it arrives as a table with
    // the places left in a column of their own; the bar is what a public
    // layout makes of the same number.
    expect($this->get(framework(Project::Education, 'cours'))->getContent())
        ->toContain('Préparation DELF B2')
        ->toContain('3 places');

    expect($this->get(framework(Project::Education, 'cours', layout: KitLayout::Marketing))->getContent())
        ->toContain('role="progressbar"');

    expect($this->get(framework(Project::Logistics, 'tournees'))->getContent())
        ->toContain('T-15 · Gros-de-Vaud')
        ->toContain('data-ref="&lt;x-kit.table /&gt;"');

    expect($this->get(framework(Project::Butcher, 'horaires'))->getContent())
        ->toContain('07h00 – 12h30 · 14h30 – 18h30');

    expect($this->get(framework(Project::Haircut, 'rendez-vous'))->getContent())
        ->toContain('name="booking-slot"')
        ->toContain('name="booking-subject"')
        ->toContain('type="submit"');

    expect($this->get(framework(Project::Cabinet, 'equipe'))->getContent())
        ->toContain('Me Claire Vigne');

    expect($this->get(framework(Project::Farm, 'commande'))->getContent())
        ->toContain('name="contact-email"')
        ->toContain('name="contact-choice"');
});

it('marks the days the content names on the calendar rather than hard-coding a month', function () {
    // Standard, because the market days arrive in a console, and a plain
    // degree drops the legend along with every other ornament.
    $html = $this->get(framework(Project::Farm, 'marches', variation: Variation::Standard))->assertOk()->getContent();

    $marketDays = collect(Carbon::now()->startOfMonth()->daysUntil(Carbon::now()->endOfMonth()))
        ->filter(fn (Carbon $day): bool => in_array($day->dayOfWeekIso, [3, 6], true))
        ->count();

    expect($marketDays)->toBeGreaterThan(7)
        ->and($html)->toContain(Carbon::now()->startOfMonth()->translatedFormat('F Y'))
        ->and($html)->toContain(Project::Farm->section('marches')['data']['legend']);
});

it('keeps the mock site in its own language whatever the locale is', function (string $locale) {
    app()->setLocale($locale);

    $html = $this->get(route('framework'))->assertOk()->getContent();

    // The bar of the one rendered section, in French — once on a wide screen,
    // because the footer no longer repeats the same links beneath it.
    foreach (Project::default()->sections() as $section) {
        expect(substr_count(withoutBreadcrumb(mockSite($html)), '>'.$section['label'].'</a>'))->toBe(1);
    }
})->with(['fr', 'en']);

it('names every project, degree and palette in every locale', function (string $locale) {
    app()->setLocale($locale);

    foreach (Project::cases() as $project) {
        expect($project->label())->not->toContain('framework.project')
            ->and($project->summary())->not->toContain('framework.project');
    }

    foreach (Variation::cases() as $degree) {
        expect($degree->label())->not->toContain('framework.variation')
            ->and($degree->summary())->not->toContain('framework.variation');
    }

    expect(__('framework.title'))->not->toContain('framework.')
        ->and(__('framework.fitting'))->not->toContain('framework.')
        ->and(__('framework.projects'))->not->toContain('framework.')
        ->and(__('framework.palettes'))->not->toContain('framework.')
        ->and(__('framework.layouts'))->not->toContain('framework.')
        ->and(__('framework.variations'))->not->toContain('framework.')
        ->and(__('shell.nav.framework'))->not->toContain('shell.nav');
})->with(['fr', 'de', 'it', 'en']);

it('gives a layout exactly one navigation over the project’s sections', function () {
    /*
     * What "duplicate navigation" means here is two lists of the same sections
     * on screen at once — not two links that happen to share a target. A hero's
     * call to action pointing at the shop is content, and the breadcrumb is a
     * trail back to the root; neither is a second navigation. So this counts
     * the components that enumerate the sections, which is the thing there
     * should be one of.
     */
    $navigations = fn (string $html): int => substr_count($html, 'data-ref="&lt;x-kit.navbar /&gt;"')
        + substr_count($html, 'data-ref="&lt;x-kit.side-nav')
        + substr_count($html, 'data-ref="&lt;x-kit.vertical-nav /&gt;"')
        + substr_count($html, 'data-ref="&lt;x-kit.tabs variant=&quot;pill&quot; /&gt;"');

    foreach (KitLayout::cases() as $layout) {
        $site = mockSite($this->get(framework(Project::Farm, 'accueil', layout: $layout))->assertOk()->getContent());

        // The marketing footer used to repeat the bar, the stacked layout put a
        // tab strip under both, and the workspace rail spelled the list column's
        // items in initials — three ways to say the same five links.
        expect($navigations(withoutBreadcrumb($site)))->toBe(1, $layout->value.' draws '.$navigations(withoutBreadcrumb($site)).' navigations');

        // And every section is still reachable from somewhere on the page.
        foreach (array_keys(Project::Farm->sections()) as $key) {
            expect($site)->toContain('href="'.e(framework(Project::Farm, $key, layout: $layout)).'"');
        }
    }

    // The footer still says where the place is, which was never the duplicate.
    expect($this->get(framework(Project::Farm, 'accueil'))->getContent())
        ->toContain('Route des Combes 4, 1630 Bulle');
});

it('leaves a phone a way out of the section it is on', function () {
    /*
     * The kit's navbar hid its own links below `sm` — upstream they sit behind
     * a hamburger, and this mock site has no script to open one. So the public
     * layouts had no navigation at all on a phone once the footer's duplicate
     * list was removed. The fix is in the bar itself, which now wraps.
     */
    expect(file_get_contents(package_path('resources/views/components/kit/navbar.blade.php')))
        ->toContain('<div class="flex flex-wrap items-center gap-1">')
        ->not->toContain('hidden items-center gap-1 sm:flex');

    foreach ([KitLayout::Marketing, KitLayout::Stacked] as $layout) {
        $site = mockSite($this->get(framework(Project::Farm, 'accueil', layout: $layout))->assertOk()->getContent());

        $bar = (string) str($site)->after('data-ref="&lt;x-kit.navbar /&gt;"')->before('</nav>');

        foreach (Project::Farm->sections() as $key => $section) {
            expect($bar)->toContain('href="'.e(framework(Project::Farm, $key, layout: $layout)).'"')
                ->and($bar)->not->toContain('hidden');
        }
    }
});
