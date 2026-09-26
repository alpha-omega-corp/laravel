<?php

use Illuminate\Support\Facades\Blade;

/*
 * The prefabs: the kit components a business's site is built around — opening
 * hours, a menu, a map, a catalogue. `ui:layout` writes every tag bare, so each
 * one has to render with no props at all; given its data, it has to say the one
 * thing a visitor came to check.
 */

it('renders bare, which is how a build writes it', function (string $name) {
    expect(Blade::render("<x-kit.{$name} />"))->toContain('data-ref="&lt;x-kit.'.$name.' /&gt;"');
})->with(['schedule', 'menu', 'map', 'catalogue']);

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

    expect(Blade::render('<x-kit.map />'))->not->toContain('<iframe')->toContain(__('kit.no_address'));
});

it('is a preview until it is given a checkout, and a form per item after', function () {
    $items = [['id' => 'eggs', 'name' => 'Eggs', 'price' => '6.–']];

    expect(Blade::render('<x-kit.catalogue :items="$items" />', ['items' => $items]))
        ->toContain('Eggs')->not->toContain('<form');

    expect(Blade::render('<x-kit.catalogue :items="$items" checkout="/checkout" />', ['items' => $items]))
        ->toContain('action="/checkout"')->toContain('name="item" value="eggs"')->toContain('name="_token"');
});
