<?php

declare(strict_types=1);

use Workbench\App\Enums\Appearance;
use Workbench\App\Enums\Contrast;
use Workbench\App\Enums\Theme;

use function Orchestra\Testbench\package_path;

/**
 * The stylesheet with its comments taken out, because they discuss the very
 * selectors and at-rules these tests assert are absent.
 */
function themeRules(): string
{
    return preg_replace('#/\*.*?\*/#s', '', file_get_contents(package_path('resources/css/themes.css')));
}

it('defaults to the palette whose tokens are declared in app.css', function () {
    expect(Theme::default())->toBe(Theme::Orchard);
});

it('leaves light or dark to the system until someone chooses', function () {
    expect(Appearance::default())->toBe(Appearance::System)
        ->and(Appearance::System->attribute())->toBeNull()
        ->and(Appearance::Light->attribute())->toBe('light')
        ->and(Appearance::Dark->attribute())->toBe('dark');
});

it('describes every palette and every appearance in every locale', function (string $locale) {
    app()->setLocale($locale);

    foreach (Theme::cases() as $theme) {
        expect($theme->summary())->not->toContain('theme.summary');
    }

    foreach (Appearance::cases() as $appearance) {
        expect($appearance->label())->not->toContain('theme.label')
            ->and($appearance->summary())->not->toContain('theme.summary');
    }
})->with(['fr', 'de', 'it', 'en']);

it('has a token block for every palette, on the palette axis', function () {
    $css = themeRules();

    foreach (Theme::cases() as $theme) {
        expect($css)->toContain("[data-palette='".$theme->value."']")
            ->and($css)->not->toContain("[data-theme='".$theme->value."']");
    }
});

it('turns a chosen appearance into a colour scheme, and nothing else', function () {
    $css = themeRules();

    expect($css)->toContain('color-scheme: light dark;')
        ->and($css)->toContain("[data-theme='light']")
        ->and($css)->toContain("[data-theme='dark']");

    // The dark half is inside each palette, never a second copy of it.
    expect($css)->not->toContain('prefers-color-scheme');
});

it('declares every palette in both schemes at once', function () {
    $css = themeRules();

    foreach (Theme::cases() as $theme) {
        $start = strpos($css, "[data-palette='".$theme->value."']");
        $block = substr($css, $start, strpos($css, "\n}", $start) - $start);

        expect($block)->toContain('light-dark(');

        // A colour that reads the same in both schemes needs no pair, but a
        // palette whose canvas does not change has no dark scheme at all.
        expect($block)->toMatch('/--color-canvas:\s*light-dark\(/');
        expect($block)->toMatch('/--color-ink:\s*light-dark\(/');
    }
});

it('never wraps a whole value in light-dark, which only takes colours', function () {
    $css = themeRules();

    expect($css)->not->toMatch('/light-dark\(\s*(none|\d)/');
});

it('leaves the contrast to the palette until someone raises it', function () {
    expect(Contrast::default())->toBe(Contrast::Normal)
        ->and(Contrast::Normal->attribute())->toBeNull()
        ->and(Contrast::High->attribute())->toBe('high');
});

it('names and describes both contrasts in every locale', function (string $locale) {
    app()->setLocale($locale);

    foreach (Contrast::cases() as $contrast) {
        expect($contrast->label())->not->toContain('theme.label')
            ->and($contrast->summary())->not->toContain('theme.summary');
    }
})->with(['fr', 'de', 'it', 'en']);

it('raises the contrast by deriving from the palette, not by adding another one', function () {
    $css = themeRules();

    expect($css)->toContain("[data-contrast='high']")
        // It reaches into a nested preview too, or a palette panel on the kit
        // pages would drop back to normal inside a page that is not.
        ->and($css)->toContain("[data-contrast='high'] [data-palette]");

    $block = substr($css, strpos($css, "[data-contrast='high']"));

    // Every value is derived from a token already in force.
    expect($block)->toContain('color-mix(in oklab, var(--color-ink)')
        ->and($block)->toContain('--panel-border: 1.5px solid var(--color-ink)');

    // No palette is named in it: one rule has to serve all seven.
    foreach (['orchard', 'sandstone', 'harbour', 'graphite', 'blossom', 'fresh', 'vellum'] as $palette) {
        expect($block)->not->toContain($palette);
    }
});
