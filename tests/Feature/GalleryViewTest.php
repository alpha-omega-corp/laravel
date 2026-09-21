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

it('shows the page with its index beside it', function (string $url) {
    $html = $this->get($url)->assertOk()->getContent();

    expect($html)->toContain('data-ref="&lt;x-kit.side-nav')
        ->and($html)->toContain('lg:grid-cols-[15rem_minmax(0,1fr)]');
})->with('galleries');

it('offers no preview of itself at phone width', function (string $url) {
    /*
     * There was a desktop/mobile switch that loaded the same route into a
     * 390px iframe. It is gone, along with the shell's `bare` render that only
     * ever served it: these pages are responsive in the browser's own window.
     */
    $html = $this->get($url)->assertOk()->getContent();

    expect($html)->not->toContain('<iframe')
        ->and($html)->not->toContain('view=mobile')
        ->and($html)->not->toContain('w-[390px]');
})->with('galleries');

it('ignores the query the frame used to be requested with', function (string $url) {
    // ?frame=1 is now just an unknown parameter: the same chromed page answers.
    $framed = $this->get($url.'?frame=1')->assertOk()->getContent();

    expect($framed)->toContain(__('shell.skip_to'))
        ->and($framed)->toContain(__('shell.nav.framework'))
        ->and($framed)->toContain('data-ref="&lt;x-kit.side-nav');
})->with('galleries');

it('keeps the shell chrome on every gallery', function (string $url) {
    $html = $this->get($url)->assertOk()->getContent();

    expect($html)->toContain('id="content"')
        ->and($html)->toContain(__('theme.choose'))
        ->and($html)->toContain('data-palette=')
        ->and($html)->toContain("localStorage.getItem('ui-palette')");
})->with('galleries');

it('still renders every element of the kit', function () {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    foreach (KitComponent::cases() as $element) {
        expect($html)->toContain('id="'.$element->value.'"');
    }
});

it('names no view it no longer has', function () {
    // The three ui_kit.view.* keys went with the switch, in all four locales.
    foreach (['fr', 'de', 'it', 'en'] as $locale) {
        expect(require lang_path($locale.'/ui_kit.php'))->not->toHaveKey('view');
    }
});
