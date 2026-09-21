<?php

declare(strict_types=1);

it('serves the home page at the root', function () {
    $this->get(route('home'))->assertOk();
});

it('renders the shell chrome around it', function () {
    $response = $this->get(route('home'))->assertOk();

    $response->assertSee(__('shell.skip_to'))
        ->assertSee(__('shell.nav.framework'))
        ->assertSee(__('home.title'));
});

it('describes what the site holds, and links to each of it', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    $main = (string) str($html)->after('<main id="content">')->before('</main>');

    expect(trim(strip_tags($main)))->not->toBe('')
        ->and($main)->toContain(__('home.intro'));

    // One card per tab: its name, one line about it, and the way in.
    foreach (['ui_kit' => 'ui-kit', 'layouts' => 'layouts', 'framework' => 'framework', 'graph' => 'graph'] as $tab => $route) {
        expect($main)->toContain(__('home.tab.'.$tab))
            ->and($main)->toContain('href="'.e(route($route)).'"');
    }

    // The page does not print its own title again — the shell already did.
    expect($main)->not->toContain('<h1');
});

it('says nothing the tabs have to keep in step with', function () {
    // The home copy summarises; it must not be a second copy of a tab's intro.
    foreach ([__('ui_kit.index.intro'), __('framework.intro')] as $intro) {
        expect(__('home.intro'))->not->toContain($intro);
    }
});

it('titles the page in the active locale', function (string $locale) {
    app()->setLocale($locale);

    $this->get(route('home'))->assertOk()->assertSee(__('home.title', locale: $locale));
})->with(['fr', 'de', 'it', 'en']);
