<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/*
 * The navigation styles: the navbar, the tabs and the breadcrumb each take a
 * `variant`, name it in the dev badge, fall back to their first when given one
 * they do not have, and are all shown on the UI kit page.
 */

dataset('navigation styles', [
    'navbar' => ['navbar', ['plain', 'underline', 'centred', 'brand']],
    'tabs' => ['tabs', ['underline', 'pill', 'bar', 'enclosed']],
    'breadcrumb' => ['breadcrumb', ['chevron', 'slash', 'contained']],
]);

/** The dev badge a component draws for a style; the first style of the navbar and the breadcrumb keeps its old, bare name. */
function navigationRef(string $component, string $variant, string $first): string
{
    $bare = $component !== 'tabs' && $variant === $first;

    return 'data-ref="'.e($bare ? "<x-kit.{$component} />" : "<x-kit.{$component} variant=\"{$variant}\" />").'"';
}

function drawNavigation(string $component, ?string $variant): string
{
    $items = [['label' => 'Home', 'href' => '/', 'current' => false], ['label' => 'Here', 'current' => true]];

    return Blade::render("<x-kit.{$component} :items=\"\$items\" :variant=\"\$variant\" />", ['items' => $items, 'variant' => $variant]);
}

it('draws every style, named in the dev badge, the current item marked', function (string $component, array $variants) {
    foreach ($variants as $variant) {
        $html = drawNavigation($component, $variant);

        expect($html)->toContain(navigationRef($component, $variant, $variants[0]))
            ->and($html)->toContain('aria-current="page"')
            ->and($html)->toContain('Home')
            ->and($html)->toContain('Here');
    }
})->with('navigation styles');

it('falls back to its first style when given one it does not have', function (string $component, array $variants) {
    expect(drawNavigation($component, 'sideways'))->toContain(navigationRef($component, $variants[0], $variants[0]));
})->with('navigation styles');

it('shows every style on the UI kit page', function (string $component, array $variants) {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    foreach ($variants as $variant) {
        expect($html)->toContain(navigationRef($component, $variant, $variants[0]));
    }
})->with('navigation styles');
