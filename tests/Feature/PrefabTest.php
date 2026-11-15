<?php

use Illuminate\Support\Facades\Blade;

/*
 * The prefabs: the kit components a business's site is built around — opening
 * hours, a menu, a map, a catalogue. `ui:layout` writes every tag bare, so each
 * one fills itself from what the site binds as `kit.<name>`, keyed by its own
 * prop names; props written on the tag win; and with data from neither it
 * renders nothing, since a week of "closed" nobody entered is false.
 */

/**
 * @return array<string, array{0: array<string, mixed>, 1: list<string>}> each prefab's bound data, and what it has to show of it
 */
function prefabData(): array
{
    return [
        'schedule' => [['title' => 'Horaires', 'days' => [['day' => 'Mardi', 'hours' => '11:30–22:00']], 'note' => 'Fermé en août'], ['Horaires', 'Mardi', '11:30–22:00', 'Fermé en août']],
        'menu' => [['title' => 'La carte', 'sections' => [['title' => 'Pizze', 'items' => [['name' => 'Margherita', 'price' => '14.50']]]]], ['La carte', 'Pizze', 'Margherita', '14.50']],
        'catalogue' => [['items' => [['id' => 7, 'name' => 'Œufs', 'price' => '6.–']], 'checkout' => '/checkout'], ['Œufs', '6.–', 'action="/checkout"', 'value="7"']],
        'map' => [['address' => 'Rue du Marché 1, Genève', 'title' => 'Chez Anna', 'zoom' => 12], ['q=Rue%20du%20March%C3%A9%201%2C%20Gen%C3%A8ve', '&amp;z=12', 'Chez Anna']],
        'booking' => [['title' => 'Réserver', 'intro' => 'Une table ce soir ?', 'url' => null, 'services' => ['Coupe', 'Couleur'], 'action' => '/booking'], ['Réserver', 'Une table ce soir ?', 'action="/booking"', 'Coupe', 'name="website"']],
        'events' => [['title' => 'Au domaine', 'events' => [['date' => 'samedi 12 octobre', 'time' => '18:00–22:00', 'datetime' => '2026-10-12T18:00', 'name' => 'Caves ouvertes', 'description' => 'Six vins à goûter', 'image' => '/caves.jpg']]], ['Au domaine', 'datetime="2026-10-12T18:00"', 'samedi 12 octobre', '18:00–22:00', 'Caves ouvertes', 'Six vins à goûter', 'src="/caves.jpg"']],
        'faq' => [['title' => 'Questions', 'entries' => [['question' => 'Où se garer ?', 'answer' => 'Place du Marché']]], ['Questions', 'Où se garer ?', 'Place du Marché']],
        'gallery' => [['title' => 'Nos réalisations', 'pictures' => [['image' => '/mariage.jpg', 'alt' => 'Un bouquet de pivoines', 'caption' => 'Mariage à Nyon', 'width' => 1200, 'height' => 1600]]], ['Nos réalisations', 'src="/mariage.jpg"', 'alt="Un bouquet de pivoines"', 'width="1200"', 'Mariage à Nyon']],
        'team' => [['title' => 'L’équipe', 'members' => [['name' => 'Léa Martin', 'role' => 'Coiffeuse', 'bio' => 'Les coupes courtes', 'image' => '/lea.jpg']]], ['L’équipe', 'Léa Martin', 'Coiffeuse', 'Les coupes courtes', 'src="/lea.jpg"']],
        'projects' => [['title' => 'Nos chantiers', 'projects' => [['name' => 'Halle de production', 'place' => 'Bussigny', 'year' => 2024, 'kind' => 'Structure béton', 'figure' => '4 200 m²', 'figure_label' => 'de surface', 'summary' => 'Livrée en quatorze mois', 'image' => '/halle.jpg', 'alt' => 'La halle, façade sud', 'href' => '/chantiers/halle']]], ['Nos chantiers', 'Halle de production', 'Bussigny · 2024', 'Structure béton', '4 200 m²', 'de surface', 'Livrée en quatorze mois', 'src="/halle.jpg"', 'alt="La halle, façade sud"', 'href="/chantiers/halle"']],
        'services' => [['title' => 'Nos domaines', 'services' => [['name' => 'Droit du bail', 'line' => 'Résiliations, loyers, défauts', 'price' => 'dès CHF 250', 'href' => '/domaines/bail']]], ['Nos domaines', 'Droit du bail', 'Résiliations, loyers, défauts', 'dès CHF 250', 'href="/domaines/bail"']],
        'process' => [['title' => 'Comment ça se passe', 'intro' => 'Du premier appel à la remise des clés', 'steps' => [['name' => 'Visite', 'line' => 'Nous venons voir', 'duration' => 'une heure']]], ['Comment ça se passe', 'Du premier appel à la remise des clés', '01', 'Visite', 'Nous venons voir', 'une heure']],
        'testimonials' => [['title' => 'Ils nous ont fait confiance', 'testimonials' => [['quote' => 'Livré à la date dite', 'name' => 'Anne Rochat', 'role' => 'Maître d’ouvrage, Renens', 'image' => '/anne.jpg']]], ['Ils nous ont fait confiance', 'Livré à la date dite', 'Anne Rochat', 'Maître d’ouvrage, Renens', 'src="/anne.jpg"']],
        'pricing' => [['title' => 'Tarifs', 'intro' => 'Sans engagement', 'note' => 'Prix hors TVA', 'plans' => [['name' => 'Poste fixe', 'price' => 'CHF 480', 'period' => 'par mois', 'line' => 'Votre bureau, toujours', 'includes' => ['Accès 24 h sur 24'], 'href' => '/contact', 'label' => 'Visiter', 'featured' => true, 'flag' => 'Le plus choisi']]], ['Tarifs', 'Sans engagement', 'Prix hors TVA', 'Poste fixe', 'CHF 480', 'par mois', 'Votre bureau, toujours', 'Accès 24 h sur 24', 'href="/contact"', 'Visiter', 'Le plus choisi']],
        'listings' => [['title' => 'À louer', 'listings' => [['name' => '3,5 pièces sous les toits', 'place' => 'Vevey', 'price' => 'CHF 1 850.–/mois', 'status' => 'Nouveau', 'facts' => [['label' => 'Surface', 'value' => '78 m²']], 'image' => '/vevey.jpg', 'alt' => 'Le séjour', 'href' => '/biens/vevey']]], ['À louer', '3,5 pièces sous les toits', 'Vevey', 'CHF 1 850.–/mois', 'Nouveau', 'Surface', '78 m²', 'src="/vevey.jpg"', 'alt="Le séjour"', 'href="/biens/vevey"']],
        'credentials' => [['title' => 'Certifications', 'credentials' => [['name' => 'ISO 9001', 'detail' => 'Certifié depuis 2012', 'logo' => '/iso.svg', 'href' => 'https://example.org/iso']]], ['Certifications', 'ISO 9001', 'Certifié depuis 2012', 'src="/iso.svg"', 'href="https://example.org/iso"']],
        'jobs' => [['title' => 'Nous recrutons', 'intro' => 'Trois postes ouverts', 'jobs' => [['name' => 'Conducteur de travaux', 'place' => 'Lausanne', 'hours' => '80–100 %', 'line' => 'Deux chantiers à mener', 'href' => '/emplois/conducteur']]], ['Nous recrutons', 'Trois postes ouverts', 'Conducteur de travaux', 'Lausanne', '80–100 %', 'Deux chantiers à mener', 'href="/emplois/conducteur"']],
        'quote' => [['title' => 'Demander un devis', 'intro' => 'Décrivez votre projet', 'note' => 'Réponse sous deux jours ouvrables', 'scopes' => ['Gros œuvre', 'Rénovation'], 'budgets' => ['Moins de CHF 50 000'], 'action' => '/quote'], ['Demander un devis', 'Décrivez votre projet', 'Réponse sous deux jours ouvrables', 'Gros œuvre', 'Moins de CHF 50 000', 'action="/quote"', 'name="website"']],
        'donate' => [['title' => 'Nous soutenir', 'intro' => 'Un don finance une saison', 'url' => 'https://example.org/don', 'label' => 'Donner', 'details' => [['label' => 'IBAN', 'value' => 'CH93 0076 2011 6238 5295 7']], 'note' => 'Dons déductibles'], ['Nous soutenir', 'Un don finance une saison', 'href="https://example.org/don"', 'Donner', 'IBAN', 'CH93 0076 2011 6238 5295 7', 'Dons déductibles']],
        'courses' => [['title' => 'Cours', 'courses' => [['name' => 'Initiation au ski de randonnée', 'date' => 'du 9 au 14 février', 'datetime' => '2027-02-09', 'time' => '9:00–16:00', 'level' => 'Débutants', 'place' => 'Verbier', 'price' => 'CHF 690', 'seats' => '2 places', 'href' => '/cours/initiation', 'label' => 'S’inscrire']]], ['Cours', 'Initiation au ski de randonnée', 'du 9 au 14 février', 'datetime="2027-02-09"', '9:00–16:00', 'Débutants · Verbier', 'CHF 690', '2 places', 'href="/cours/initiation"']],
    ];
}

it('renders nothing bare and unbound, and nothing when what is bound is empty', function (string $name) {
    expect(trim(Blade::render("<x-kit.{$name} />")))->toBe('');

    app()->instance("kit.{$name}", []);
    expect(trim(Blade::render("<x-kit.{$name} />")))->toBe('');

    app()->instance("kit.{$name}", array_map(fn (mixed $value): mixed => is_array($value) ? [] : null, prefabData()[$name][0]));
    expect(trim(Blade::render("<x-kit.{$name} />")))->toBe('');
})->with(array_keys(prefabData()));

it('fills a bare tag from what the site binds, with the hook a direction styles it by', function (string $name) {
    [$data, $shown] = prefabData()[$name];
    app()->bind("kit.{$name}", fn (): array => $data);

    expect(Blade::render("<x-kit.{$name} />"))
        ->toContain('data-kit="'.$name.'"')
        ->toContain('data-ref="&lt;x-kit.'.$name)
        ->toContain(...$shown);
})->with(array_keys(prefabData()));

it('lets the props on the tag win over what is bound, an empty one included', function () {
    foreach (prefabData() as $name => [$data]) {
        app()->instance("kit.{$name}", $data);
    }

    expect(Blade::render('<x-kit.schedule title="Heures" :days="$days" />', ['days' => [['day' => 'Lundi', 'hours' => '9–12']]]))
        ->toContain('Heures')->toContain('Lundi')
        ->not->toContain('Horaires')->not->toContain('Mardi');

    expect(Blade::render('<x-kit.menu :sections="$sections" />', ['sections' => [['title' => 'Dolci', 'items' => [['name' => 'Tiramisù']]]]]))
        ->toContain('Tiramisù')->not->toContain('Margherita');

    expect(Blade::render('<x-kit.catalogue :items="$items" />', ['items' => [['id' => 'miel', 'name' => 'Miel']]]))
        ->toContain('Miel')->not->toContain('Œufs');

    expect(Blade::render('<x-kit.map address="Place du Molard, Genève" />'))
        ->toContain('Place%20du%20Molard')->not->toContain('March%C3%A9');

    expect(trim(Blade::render('<x-kit.schedule :days="[]" />')))->toBe('')
        ->and(trim(Blade::render('<x-kit.menu :sections="[]" />')))->toBe('')
        ->and(trim(Blade::render('<x-kit.catalogue :items="[]" />')))->toBe('')
        ->and(trim(Blade::render('<x-kit.map address="" />')))->toBe('');
});

/*
 * A tag that brings its own data brings all of it. Mixed prop by prop, a
 * hand-written list of items took the site's checkout, which reads each posted
 * id as one of the site's own rows — so Buy on the hand-written item 2 charged
 * for whatever the owner's row 2 is. The site's note, heading and caption
 * belong to the site's data just as much, and never to somebody else's.
 */
it('takes nothing from what is bound when the tag gives its own data', function () {
    foreach (prefabData() as $name => [$data]) {
        app()->instance("kit.{$name}", $data);
    }

    expect(Blade::render('<x-kit.catalogue :items="$items" />', ['items' => [['id' => 2, 'name' => 'Miel']]]))
        ->toContain('Miel')->not->toContain('<form')->not->toContain('/checkout');

    expect(Blade::render('<x-kit.schedule :days="$days" />', ['days' => [['day' => 'Lundi', 'hours' => '9–12']]]))
        ->toContain('Lundi')->not->toContain('Fermé en août')->not->toContain('Horaires');

    expect(Blade::render('<x-kit.menu :sections="$sections" />', ['sections' => [['title' => 'Dolci', 'items' => [['name' => 'Tiramisù']]]]]))
        ->not->toContain('La carte');

    expect(Blade::render('<x-kit.map address="Place du Molard, Genève" />'))
        ->not->toContain('Chez Anna')->toContain('&amp;z=15');
});

it('lets a tag with no data of its own restyle what is bound', function () {
    foreach (prefabData() as $name => [$data]) {
        app()->instance("kit.{$name}", $data);
    }

    expect(Blade::render('<x-kit.schedule title="Heures" />'))->toContain('Heures')->toContain('Mardi')->toContain('Fermé en août');
    expect(Blade::render('<x-kit.catalogue checkout="/acheter" />'))->toContain('Œufs')->toContain('action="/acheter"');
    expect(Blade::render('<x-kit.map zoom="9" />'))->toContain('March%C3%A9')->toContain('&amp;z=9')->toContain('Chez Anna');
});

it('says a day with no hours is closed rather than leaving it blank', function () {
    $html = Blade::render('<x-kit.schedule :days="$days" />', ['days' => [
        ['day' => 'Monday', 'hours' => null],
        ['day' => 'Tuesday', 'hours' => '11:30–22:00'],
    ]]);

    expect($html)->toContain(__('kit.closed'))->toContain('11:30–22:00');
});

it('puts every dish under its section with its price', function () {
    $html = Blade::render('<x-kit.menu :sections="$sections" />', ['sections' => [
        ['title' => 'Pizze', 'items' => [['name' => 'Margherita', 'price' => '14.50', 'description' => 'San Marzano, fior di latte']]],
    ]]);

    expect($html)->toContain('Pizze')->toContain('Margherita')->toContain('14.50')->toContain('fior di latte');
});

it('embeds an address with no key, and never an empty search', function () {
    $html = Blade::render('<x-kit.map address="Rue du Marché 1, Genève" />');

    expect($html)->toContain('maps.google.com/maps?q=Rue%20du%20March%C3%A9%201%2C%20Gen%C3%A8ve')
        ->not->toContain('key=');

    expect(Blade::render('<x-kit.map />'))->not->toContain('<iframe');
});

it('is a preview until it is given a checkout, and a form per item after', function () {
    $items = [['id' => 'eggs', 'name' => 'Eggs', 'price' => '6.–']];

    expect(Blade::render('<x-kit.catalogue :items="$items" />', ['items' => $items]))
        ->toContain('Eggs')->not->toContain('<form');

    expect(Blade::render('<x-kit.catalogue :items="$items" checkout="/checkout" />', ['items' => $items]))
        ->toContain('action="/checkout"')->toContain('name="item" value="eggs"')->toContain('name="_token"');
});

it('opens an answer with no script, keeps its line breaks and prints it as text', function () {
    app()->instance('kit.faq', prefabData()['faq'][0]);

    $html = Blade::render('<x-kit.faq :entries="$entries" />', ['entries' => [
        ['question' => 'Parking?', 'answer' => "Behind the station.\n<b>Free</b> at night."],
    ]]);

    expect($html)->toContain('<details')->toContain('<summary')->toContain('Parking?')
        ->toContain("Behind the station.\n&lt;b&gt;Free&lt;/b&gt; at night.")
        ->not->toContain('<script')->not->toContain('Où se garer')->not->toContain('Questions');
});

it('leads each event with its date, for a machine on the time element and as the business says it', function () {
    app()->instance('kit.events', prefabData()['events'][0]);

    $html = Blade::render('<x-kit.events :events="$events" />', ['events' => [['date' => 'du 24 au 26 octobre', 'name' => 'Fête des vendanges']]]);

    expect($html)->toContain('Fête des vendanges')->toContain('du 24 au 26 octobre')
        ->not->toContain('datetime=')->not->toContain('events-time')->not->toContain('events-image')
        ->not->toContain('Au domaine')->not->toContain('Caves ouvertes');

    expect(Blade::render('<x-kit.events title="Agenda" />'))->toContain('Agenda')->toContain('Caves ouvertes');
});
