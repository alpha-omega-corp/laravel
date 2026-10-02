<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

/*
 * The booking prefab's own contract: a form that posts what the base's
 * endpoint reads, or one link to an outside booking system, and the thanks
 * once the base has flashed `site.booking_sent`.
 */

it('posts every field the base reads, with the decoy hidden from everybody', function () {
    $html = Blade::render('<x-kit.booking action="/booking" />');

    expect($html)->toContain('id="booking"')->toContain('method="POST"')->toContain('action="/booking"')->toContain('name="_token"')
        ->toContain('type="date"')->toContain('min="'.now()->toDateString().'"')->toContain('type="time"')->toContain('type="number"')
        ->toContain('aria-hidden="true"')->toContain('name="website" tabindex="-1" autocomplete="off"');

    foreach (['name', 'contact', 'date', 'time', 'party', 'message'] as $field) {
        expect($html)->toContain('name="'.$field.'"')->toContain('for="booking-'.$field.'"');
    }

    // A service is asked only when there are some to choose from.
    expect($html)->not->toContain('name="service"');
    expect(Blade::render('<x-kit.booking action="/booking" :services="$services" />', ['services' => ['Coupe', 'Couleur']]))
        ->toContain('name="service"')->toContain('<option value="Couleur" >Couleur</option>');
});

it('links to an outside booking system instead of asking twice', function () {
    $html = Blade::render('<x-kit.booking url="https://www.planity.com/salon" />');

    expect($html)->toContain('data-kit-part="booking-link"')->toContain('href="https://www.planity.com/salon"')
        ->toContain('rel="noopener"')->not->toContain('<form');
});

it('takes nothing from what is bound when the tag gives its own action or url', function () {
    app()->instance('kit.booking', ['title' => 'Réserver', 'intro' => null, 'url' => 'https://bound.example', 'services' => [], 'action' => null]);

    expect(Blade::render('<x-kit.booking action="/demande" />'))
        ->toContain('action="/demande"')->not->toContain('bound.example')->not->toContain('Réserver');
});

it('thanks the visitor where the form was, once the base says it arrived', function () {
    session(['site.booking_sent' => true]);

    expect(Blade::render('<x-kit.booking action="/booking" />'))
        ->toContain('data-kit-part="booking-sent"')->toContain(__('kit.booking.sent'))->not->toContain('<form');
});

it('says what is wrong under its own field, and keeps what was typed', function () {
    View::share('errors', (new ViewErrorBag)->put('default', new MessageBag(['date' => ['Pas avant aujourd’hui.'], 'form' => ['Trop de demandes.']])));
    $session = app('session.store');
    $session->put('_old_input', ['name' => 'Léa Martin', 'message' => 'Une coupe courte']);
    request()->setLaravelSession($session);

    $html = Blade::render('<x-kit.booking action="/booking" />');

    expect($html)->toContain('aria-describedby="booking-date-error"')->toContain('id="booking-date-error"')
        ->toContain('Pas avant aujourd’hui.')->toContain('Trop de demandes.')
        ->toContain('value="Léa Martin"')->toContain('>Une coupe courte</textarea>');

    View::share('errors', null);
});
