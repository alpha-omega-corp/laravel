<?php

use Illuminate\Support\Facades\Blade;

it('draws nothing when the site binds no theme and the tag gives none', function () {
    expect(trim(Blade::render('<x-kit.theme-picker />')))->toBe('');
});

it('fills a bare tag from what the site binds: a menu of the three choices, the current one marked', function () {
    app()->instance('kit.theme-picker', ['current' => 'dark']);

    $html = Blade::render('<x-kit.theme-picker />');

    expect($html)
        ->toContain('data-kit="theme-picker"')->toContain('data-ref="&lt;x-kit.theme-picker /&gt;"')
        ->toContain('<details')->toContain('data-current="dark"')->toContain('aria-label="Thème: Sombre"')
        ->toContain('data-theme-choice="light"')->toContain('data-theme-choice="auto"')
        ->toMatch('/data-theme-choice="dark" data-label="Sombre"\s+aria-current="true"/')
        ->not->toMatch('/data-theme-choice="light" data-label="Clair"\s+aria-current/');
});

it('lets the prop win, and takes a value it does not know for the device\'s scheme', function () {
    app()->instance('kit.theme-picker', ['current' => 'dark']);

    expect(Blade::render('<x-kit.theme-picker current="light" />'))->toContain('data-current="light"')
        ->and(Blade::render('<x-kit.theme-picker current="sepia" />'))->toContain('data-current="auto"');
});

it('is drawn by the site header before its action once the tag asks for it and the site binds it', function () {
    $tag = '<x-kit.site-header brand="Chez Anna" :theme-picker="true" :action="[\'label\' => \'Réserver\', \'href\' => \'#visit\']" />';

    // Asked for with nothing to apply a choice: no menu.
    expect(Blade::render($tag))->not->toContain('site-header-options');

    app()->instance('kit.theme-picker', ['current' => 'auto']);

    // Bound and not asked for: the site's choice is to offer none.
    expect(Blade::render('<x-kit.site-header brand="Chez Anna" />'))->not->toContain('data-kit="theme-picker"');

    $html = Blade::render($tag);

    expect($html)->toContain('data-kit="theme-picker"')->not->toContain('data-kit="language-picker"')
        ->and(strpos($html, 'site-header-options'))->toBeLessThan(strpos($html, 'site-header-action'));
});
