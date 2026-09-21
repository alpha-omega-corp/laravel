<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Vite;

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

it('offers the dev toggle in the navigation bar, off by default', function () {
    $html = Blade::render('<x-layouts.shell title="Test">x</x-layouts.shell>');

    expect($html)->toContain('data-dev-toggle')
        ->and($html)->toContain('aria-pressed="false"')
        ->and($html)->toContain(__('shell.dev'))
        ->and($html)->not->toContain('data-dev=');
});

it('restores dev mode before the first paint', function () {
    expect(Blade::render('<x-layouts.shell title="Test">x</x-layouts.shell>'))
        ->toContain("localStorage.getItem('ui-dev')");
});

it('names the shell and the theme picker with the tag they are written as', function () {
    $html = Blade::render('<x-layouts.shell title="Test">x</x-layouts.shell>');

    expect($html)->toContain('data-ref="&lt;x-layouts.shell /&gt;"')
        ->and($html)->toContain('data-ref="&lt;x-layouts.theme-picker /&gt;"');
});

it('names a button with what it was given, leaving the defaults out', function () {
    expect(Blade::render('<x-kit.button variant="soft" size="lg">Go</x-kit.button>'))
        ->toContain('data-ref="&lt;x-kit.button variant=&quot;soft&quot; size=&quot;lg&quot; /&gt;"');

    expect(Blade::render('<x-kit.button>Go</x-kit.button>'))
        ->toContain('data-ref="&lt;x-kit.button /&gt;"');

    expect(Blade::render('<x-kit.button icon round>Go</x-kit.button>'))
        ->toContain('data-ref="&lt;x-kit.button icon round /&gt;"');
});

it('names a kit specimen with the reference that resolves it', function () {
    $html = $this->get(route('layouts'))->assertOk()->getContent();

    expect($html)->toContain('data-ref="::layout/cards/01-basic-card"')
        ->and($html)->toContain('data-ref="::application-shells/sidebar/01-simple-sidebar"');
});
