<?php

use Illuminate\Support\Facades\Blade;

/** The languages a Swiss site binds, as the base does: each code => its name in itself. */
function languages(): array
{
    return ['locales' => ['fr' => 'Français', 'de' => 'Deutsch', 'it' => 'Italiano', 'en' => 'English'], 'current' => 'de', 'action' => '/locale'];
}

it('draws nothing for one language, or with nowhere to post the choice', function () {
    expect(trim(Blade::render('<x-kit.language-picker />')))->toBe('')
        ->and(trim(Blade::render('<x-kit.language-picker action="/locale" :locales="[\'fr\' => \'Français\']" />')))->toBe('')
        ->and(trim(Blade::render('<x-kit.language-picker :locales="[\'fr\' => \'Français\', \'en\' => \'English\']" />')))->toBe('');
});

it('fills a bare tag from what the site binds: each language as its code, named in itself, posting the choice', function () {
    app()->instance('kit.language-picker', languages());

    $html = Blade::render('<x-kit.language-picker />');

    expect($html)
        ->toContain('data-kit="language-picker"')->toContain('data-ref="&lt;x-kit.language-picker /&gt;"')
        ->toContain('<form')->toContain('method="POST" action="/locale"')->toContain('name="_token"')
        ->toContain('aria-label="Français (FR)"')->toContain('aria-label="Deutsch (DE)"')->toContain('title="Italiano"')->toContain('>en</button>')
        ->toMatch('/value="de" lang="de"[^>]*aria-current="true"/')
        ->not->toMatch('/value="fr" lang="fr"[^>]*aria-current/');
});

it('lets the props on the tag win over what is bound', function () {
    app()->instance('kit.language-picker', languages());

    expect(Blade::render('<x-kit.language-picker current="it" action="/langue" :locales="[\'it\' => \'Italiano\', \'rm\' => \'Rumantsch\']" />'))
        ->toContain('action="/langue"')->toContain('Rumantsch')->not->toContain('Deutsch')
        ->toMatch('/value="it" lang="it"[^>]*aria-current="true"/');
});

it('is drawn by the site header beside its action, only once the site binds two languages', function () {
    expect(Blade::render('<x-kit.site-header brand="Chez Anna" />'))->not->toContain('language-picker');

    app()->instance('kit.language-picker', languages());

    expect(Blade::render('<x-kit.site-header brand="Chez Anna" :action="[\'label\' => \'Réserver\', \'href\' => \'#visit\']" />'))
        ->toContain('data-kit-part="site-header-options"')
        ->toContain('data-kit="language-picker"')
        ->toContain('data-kit-part="site-header-action"');
});
