<?php

declare(strict_types=1);

it('serves the home page at the root', function () {
    $this->get(route('home'))->assertOk();
});

it('renders the shell chrome around it', function () {
    $response = $this->get(route('home'))->assertOk();

    $response->assertSee(__('shell.skip_to'))
        ->assertSee(__('shell.nav.dashboard'))
        ->assertSee(__('home.title'));
});

it('leaves the content area empty', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)->toContain('<main id="content">');

    $main = str($html)->after('<main id="content">')->before('</main>');

    expect(trim(strip_tags((string) $main)))->toBe('');
});

it('titles the page in the active locale', function (string $locale) {
    app()->setLocale($locale);

    $this->get(route('home'))->assertOk()->assertSee(__('home.title', locale: $locale));
})->with(['fr', 'de', 'it', 'en']);
