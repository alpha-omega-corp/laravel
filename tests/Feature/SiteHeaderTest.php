<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

/*
 * The site header on a site of several pages: it draws the pages the worker
 * shares with every view as $siteNav when its tag is given no items, and it
 * marks the page being shown — for a screen reader with aria-current, for the
 * eye with the ink and an underline, never a colour alone — and never an
 * anchor, which names a section rather than the page.
 */

/**
 * @return array<string, bool> each link's label, and whether it is marked as the page being shown
 */
function headerLinks(string $html): array
{
    $links = [];

    foreach (renderedXPath($html)->query("//*[@data-kit-part='site-header-links']//a") ?: [] as $link) {
        assert($link instanceof DOMElement);

        $current = $link->getAttribute('aria-current') === 'page';

        // Marked for the eye as well, and not by the colour alone.
        expect(str_contains($link->getAttribute('class'), 'underline'))->toBe($current);

        $links[$link->textContent] = $current;
    }

    return $links;
}

it('draws the site\'s pages when it is given no items of its own', function () {
    expect(headerLinks(Blade::render('<x-kit.site-header brand="Chez Anna" />')))->toBe([]);

    View::share('siteNav', [
        ['label' => 'La carte', 'href' => '/la-carte', 'current' => false],
        ['label' => 'Contact', 'href' => '/contact', 'current' => true],
    ]);

    expect(headerLinks(Blade::render('<x-kit.site-header brand="Chez Anna" />')))->toBe(['La carte' => false, 'Contact' => true]);

    // Items on the tag win over the site's.
    expect(headerLinks(Blade::render('<x-kit.site-header :items="$items" />', ['items' => [['label' => 'Horaires', 'href' => '#horaires']]])))
        ->toBe(['Horaires' => false]);
});

it('marks the page being shown by its path, and never an anchor or another site', function (string $path, array $expected) {
    app()->instance('request', Request::create($path));

    $items = [
        ['label' => 'Horaires', 'href' => '/#horaires'],
        ['label' => 'La carte', 'href' => '/la-carte'],
        ['label' => 'La maison', 'href' => 'http://localhost/la-maison/'],
        ['label' => 'Instagram', 'href' => 'https://instagram.com/la-carte'],
        ['label' => 'Tout de suite', 'href' => '#carte', 'current' => true],
    ];

    expect(headerLinks(Blade::render('<x-kit.site-header :items="$items" />', ['items' => $items])))
        ->toBe(array_merge(array_fill_keys(array_column($items, 'label'), false), $expected));
})->with([
    'home' => ['/', []],
    'an inner page' => ['/la-carte', ['La carte' => true]],
    'a page written with its host and a trailing slash' => ['/la-maison', ['La maison' => true]],
]);
