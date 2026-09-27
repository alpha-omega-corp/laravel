<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

use function Orchestra\Testbench\package_path;

/*
 * The sections a public site is built from — site-header, hero, features,
 * section, cta-band, site-footer and media — and the hooks the directions style
 * them and the four prefabs through.
 *
 * A direction is CSS over one DOM, so the whole bargain is here: every section
 * renders bare, since `ui:layout` writes every tag that way; bare, it draws
 * frames and marks and never a word; it reads the palette's tokens and nothing
 * else; and its markup is the same whatever direction the page is drawn in,
 * with exactly the hooks deployer's drawings and the stylesheet are written to.
 */

/**
 * @return array<string, list<string>> each component's `data-kit-part` hooks, as deployer's parity test pins them
 */
function sectionHooks(): array
{
    return [
        'media' => ['media-image', 'media-frame', 'media-caption'],
        'section' => ['section-head', 'section-eyebrow', 'section-title', 'section-mark', 'section-lead', 'section-body'],
        'hero' => ['hero-copy', 'hero-eyebrow', 'hero-title', 'hero-mark', 'hero-lead', 'hero-actions', 'hero-note', 'hero-facts', 'hero-fact', 'hero-media'],
        'site-header' => ['site-header-bar', 'site-header-status', 'site-header-phone', 'site-header-nav', 'site-header-brand', 'site-header-links', 'site-header-action'],
        'site-footer' => ['site-footer-about', 'site-footer-brand', 'site-footer-blurb', 'site-footer-contact', 'site-footer-links', 'site-footer-note'],
        'features' => ['features-head', 'features-eyebrow', 'features-title', 'features-mark', 'features-lead', 'features-list', 'features-item', 'features-media', 'features-copy', 'features-item-title', 'features-body', 'features-link'],
        'cta-band' => ['cta-band-copy', 'cta-band-eyebrow', 'cta-band-title', 'cta-band-mark', 'cta-band-lead', 'cta-band-actions', 'cta-band-details', 'cta-band-detail'],
        'menu' => ['menu-title', 'menu-section', 'menu-section-title', 'menu-list', 'menu-item', 'menu-row', 'menu-name', 'menu-leader', 'menu-price', 'menu-description'],
        'schedule' => ['schedule-title', 'schedule-days', 'schedule-day', 'schedule-dayname', 'schedule-hours', 'schedule-closed', 'schedule-note'],
        'catalogue' => ['catalogue-item', 'catalogue-image', 'catalogue-frame', 'catalogue-body', 'catalogue-row', 'catalogue-name', 'catalogue-price', 'catalogue-description', 'catalogue-action'],
        'map' => ['map-frame', 'map-caption', 'map-address', 'map-directions'],
    ];
}

/**
 * @return list<string>
 */
function sectionNames(): array
{
    return ['section', 'hero', 'media', 'site-header', 'site-footer', 'features', 'cta-band'];
}

function sectionSource(string $name): string
{
    return (string) file_get_contents(package_path("resources/views/components/kit/{$name}.blade.php"));
}

/**
 * Each component given one of everything it takes, so a branch that only renders
 * with data is compared across directions too.
 *
 * @return array<string, array{0: string, 1: array<string, mixed>}>
 */
function sectionSamples(): array
{
    $links = [['label' => 'Réserver', 'href' => 'tel:+41220000000'], ['label' => 'La carte', 'href' => '#menu']];

    return [
        'media' => ['<x-kit.media src="/salle.jpg" subject="La salle" ratio="16/9" :priority="true" />', []],
        'section' => ['<x-kit.section eyebrow="Depuis 1998" title="La maison" lead="Une cuisine de marché.">Le texte</x-kit.section>', []],
        'hero' => ['<x-kit.hero eyebrow="Genève" title="Chez Anna" lead="Une cuisine de marché" subject="La salle, le soir" note="Ouvert ce soir" :links="$links" :facts="$facts" />', [
            'links' => $links,
            'facts' => [['value' => '1998', 'label' => 'Depuis']],
        ]],
        'site-header' => ['<x-kit.site-header brand="Chez Anna" status="Ouvert aujourd\'hui" phone="+41 22 000 00 00" :items="$items" :action="$action" />', [
            'items' => [['label' => 'La carte', 'href' => '#menu']],
            'action' => ['label' => 'Réserver', 'href' => '#visit'],
        ]],
        'site-footer' => ['<x-kit.site-footer brand="Chez Anna" blurb="Une cuisine de marché." address="Rue du Marché 1, 1204 Genève" phone="+41 22 000 00 00" email="anna@example.org" note="© Chez Anna" :links="$links" />', [
            'links' => $links,
        ]],
        'features' => ['<x-kit.features eyebrow="La maison" title="Ce que nous faisons" lead="Trois choses." :items="$items" />', [
            'items' => [
                ['title' => 'La salle', 'body' => 'Quarante couverts.', 'subject' => 'La salle, le soir', 'href' => '#visit'],
                ['title' => 'La cuisine', 'image' => '/cuisine.jpg', 'subject' => 'Le passe'],
            ],
        ]],
        'cta-band' => ['<x-kit.cta-band eyebrow="Venir" title="Réservez" lead="Du mardi au samedi." :links="$links" :details="$details" />', [
            'links' => $links,
            'details' => [['label' => 'Adresse', 'value' => 'Rue du Marché 1'], ['label' => 'Téléphone', 'value' => '+41 22 000 00 00', 'href' => 'tel:+41220000000']],
        ]],
        'menu' => ['<x-kit.menu title="La carte" :sections="$sections" />', [
            'sections' => [['title' => 'Pizze', 'items' => [['name' => 'Margherita', 'price' => '14.50', 'description' => 'San Marzano']]]],
        ]],
        'schedule' => ['<x-kit.schedule title="Horaires" note="Fermé en août" :days="$days" />', [
            'days' => [['day' => 'Lundi', 'hours' => null], ['day' => 'Mardi', 'hours' => '11:30–22:00']],
        ]],
        'catalogue' => ['<x-kit.catalogue :items="$items" />', [
            'items' => [['name' => 'Œufs', 'price' => '6.–', 'description' => 'La douzaine', 'image' => '/oeufs.jpg', 'href' => '/oeufs'], ['name' => 'Miel', 'price' => '12.–']],
        ]],
        'map' => ['<x-kit.map address="Rue du Marché 1, Genève" title="Chez Anna" />', []],
    ];
}

/**
 * @return list<string> the direction names, off the specs
 */
function sectionDirections(): array
{
    $specs = glob(package_path('.claude/skills/ui-kit/directions/*.md')) ?: [];

    return array_values(array_filter(
        array_map(fn (string $path): string => basename($path, '.md'), $specs),
        fn (string $name): bool => $name !== 'README',
    ));
}

it('renders bare, which is how a build writes it', function (string $name) {
    expect(Blade::render("<x-kit.{$name} />"))
        ->toContain('data-ref="&lt;x-kit.'.$name.' /&gt;"')
        ->toContain('data-kit="'.$name.'"');
})->with(sectionNames());

it('says nothing bare: frames and marks, never a word', function (string $name) {
    expect(trim(strip_tags(Blade::render("<x-kit.{$name} />"))))->toBe('');
})->with(sectionNames());

it('reads the palette and nothing else', function (string $name) {
    expect(sectionSource($name))
        ->not->toMatch('/\bdark:/')
        ->not->toMatch('/\b(?:bg|text|border|from|via|to|ring|divide|fill|stroke)-(?:white|black|(?:slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose)-\d{2,3})\b/');
})->with(array_keys(sectionHooks()));

it('carries exactly its hooks, each named after the component', function (string $name) {
    preg_match_all('/data-kit-part="([^"]+)"/', sectionSource($name), $matches);

    $hooks = array_values(array_unique($matches[1]));
    sort($hooks);

    $expected = sectionHooks()[$name];
    sort($expected);

    expect($hooks)->toBe($expected);

    foreach ($hooks as $hook) {
        expect($hook)->toStartWith($name.'-');
    }
})->with(array_keys(sectionHooks()));

it('draws one DOM under every direction', function (string $name) {
    [$template, $data] = sectionSamples()[$name];

    $plain = [Blade::render("<x-kit.{$name} />"), Blade::render($template, $data)];

    expect(sectionDirections())->not->toBeEmpty();

    foreach (sectionDirections() as $direction) {
        View::share('direction', $direction);

        expect([Blade::render("<x-kit.{$name} />"), Blade::render($template, $data)])->toBe($plain);
    }

    View::share('direction', null);

    expect(sectionSource($name))->not->toMatch('/\$direction|data-direction/');
})->with(array_keys(sectionHooks()));

it('frames a photograph that is not there yet, and captions it with what goes there', function () {
    expect(Blade::render('<x-kit.media />'))->not->toContain('<img')->toContain('data-kit-part="media-frame"')
        ->not->toContain('media-caption');

    expect(Blade::render('<x-kit.media subject="La salle" />'))
        ->toContain('data-kit-part="media-caption"')->toContain('La salle')->not->toContain('<img');

    expect(Blade::render('<x-kit.media src="/salle.jpg" subject="La salle" />'))
        ->toContain('<img')->toContain('alt="La salle"')->toContain('loading="lazy"')
        ->not->toContain('media-caption')->not->toContain('media-frame');

    expect(Blade::render('<x-kit.media ratio="16/9" />'))->toContain('--media-ratio: 16 / 9');
    expect(Blade::render('<x-kit.media ratio="x" />'))->toContain('--media-ratio: 4 / 3');
    expect(Blade::render('<x-kit.media ratio="3/0" />'))->toContain('--media-ratio: 4 / 3');
    expect(Blade::render('<x-kit.media src="/salle.jpg" :priority="true" />'))->toContain('fetchpriority="high"')->not->toContain('loading="lazy"');
});

it('puts the main action first, and only the facts it is given', function () {
    [$template, $data] = sectionSamples()['hero'];
    $html = Blade::render($template, $data);

    expect(strpos($html, 'btn-primary'))->toBeLessThan(strpos($html, 'btn-secondary'))
        ->and($html)->toContain('href="tel:+41220000000"')->toContain('href="#menu"')
        ->toContain('<dt class="text-sm text-ink-soft">Depuis</dt>')->toContain('1998')
        ->toContain('La salle, le soir')->not->toContain('<img');

    expect(Blade::render('<x-kit.hero />'))->toContain('data-kit-part="media-frame"')->not->toContain('<img')
        ->not->toContain('hero-actions')->not->toContain('hero-facts');
});

it('dials a phone by its digits and shows it as written', function (string $name) {
    [$template, $data] = sectionSamples()[$name];

    expect(Blade::render($template, $data))->toContain('href="tel:+41220000000"')->toContain('>+41 22 000 00 00<');
})->with(['site-header', 'site-footer']);

it('links a block when it is given somewhere to go, and says it in the block\'s own words', function () {
    [$template, $data] = sectionSamples()['features'];
    $html = Blade::render($template, $data);

    expect($html)->toContain('data-kit-part="features-link" href="#visit"')
        ->toContain('La salle, le soir')->toContain('src="/cuisine.jpg"')->toContain('alt="Le passe"');

    expect(substr_count($html, 'data-kit-part="features-link"'))->toBe(1);
});

it('keeps a section\'s slot as its body', function () {
    expect(Blade::render('<x-kit.section title="La maison">Le texte</x-kit.section>'))
        ->toContain('data-kit-part="section-body">Le texte</div>');

    expect(Blade::render('<x-kit.section title="La maison" />'))->not->toContain('section-body');
});

it('shares the kit\'s title line and accent mark', function () {
    foreach (['section', 'features', 'cta-band', 'menu'] as $name) {
        expect(sectionSource($name))->toContain('<h2 data-kit-part="'.$name.'-title" class="font-display text-title text-ink">');
    }

    foreach (['section', 'hero', 'features', 'cta-band'] as $name) {
        expect(sectionSource($name))->toContain('<span data-kit-part="'.$name.'-mark" aria-hidden="true" class="block h-[3px] w-14 bg-accent"></span>');
    }
});
