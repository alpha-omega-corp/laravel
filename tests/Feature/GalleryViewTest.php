<?php

declare(strict_types=1);

use App\Enums\KitComponent;
use Illuminate\Support\Facades\Vite;

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

dataset('galleries', [
    'ui kit' => fn () => route('ui-kit'),
    'layouts' => fn () => route('layouts'),
]);

it('offers a desktop and a mobile view on both galleries', function (string $url) {
    $html = $this->get($url)->assertOk()->getContent();

    expect($html)->toContain(__('ui_kit.view.desktop'))
        ->and($html)->toContain(__('ui_kit.view.mobile'))
        ->and($html)->toContain($url.'?view=mobile')
        ->and($html)->toContain('data-ref="&lt;x-kit.button-group /&gt;"');
})->with('galleries');

it('starts on desktop, with the index beside the page', function (string $url) {
    $html = $this->get($url)->assertOk()->getContent();

    expect($html)->toContain('data-ref="&lt;x-kit.side-nav')
        ->and($html)->not->toContain('<iframe');
})->with('galleries');

it('shows the mobile view in a frame of its own, at phone width', function (string $url) {
    $html = $this->get($url.'?view=mobile')->assertOk()->getContent();

    expect($html)->toContain('<iframe')
        ->and($html)->toContain('src="'.$url.'?frame=1"')
        ->and($html)->toContain('w-[390px]');
})->with('galleries');

it('renders the frame without the shell chrome', function (string $url) {
    $html = $this->get($url.'?frame=1')->assertOk()->getContent();

    expect($html)->not->toContain(__('shell.skip_to'))
        ->and($html)->not->toContain(__('theme.choose'))
        ->and($html)->not->toContain(__('shell.nav.framework'))
        ->and($html)->not->toContain('<iframe')
        ->and($html)->toContain('id="content"');
})->with('galleries');

it('keeps the palette and the appearance in the frame', function (string $url) {
    $html = $this->get($url.'?frame=1')->assertOk()->getContent();

    // The head is what carries them, and the frame reads the same localStorage.
    expect($html)->toContain('data-palette=')
        ->and($html)->toContain("localStorage.getItem('ui-palette')")
        ->and($html)->toContain("localStorage.getItem('ui-theme')");
})->with('galleries');

it('still renders every element inside the frame', function () {
    $html = $this->get(route('ui-kit').'?frame=1')->assertOk()->getContent();

    foreach (KitComponent::cases() as $element) {
        expect($html)->toContain('id="'.$element->value.'"');
    }
});

it('names both views in every locale', function (string $locale) {
    app()->setLocale($locale);

    foreach (['label', 'desktop', 'mobile'] as $key) {
        expect(__('ui_kit.view.'.$key))->not->toContain('ui_kit.view');
    }
})->with(['fr', 'de', 'it', 'en']);
