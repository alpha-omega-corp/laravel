<?php

declare(strict_types=1);

use App\Enums\Appearance;
use App\Enums\Contrast;
use App\Enums\Theme;
use Illuminate\Support\Facades\Vite;

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

function shell(string $slot = '<p>Contenu</p>', array $data = []): string
{
    return Blade::render(
        '<x-layouts.shell :title="$title" :nav="$nav" :user="$user" :palette="$palette" :appearance="$appearance" :contrast="$contrast">'.$slot.'</x-layouts.shell>',
        $data + ['title' => 'Tableau de bord', 'nav' => [], 'user' => null, 'palette' => null, 'appearance' => null, 'contrast' => null],
    );
}

it('renders the slot inside the main content area', function () {
    expect(shell())->toContain('<p>Contenu</p>')
        ->and(shell())->toContain('id="content"');
});

it('shows the page title in the header', function () {
    expect(shell())->toContain('Tableau de bord');
});

it('marks the nav item matching the current url as current', function () {
    $html = shell(data: ['nav' => [
        ['label' => 'Sites', 'href' => url('/')],
        ['label' => 'Factures', 'href' => url('/factures')],
    ]]);

    expect($html)->toContain('aria-current="page"')
        ->and($html)->toContain('border-accent');
});

it('omits the account menu when no user is given', function () {
    expect(shell())->not->toContain(__('shell.account_menu'));
});

it('renders the account menu with initials when the user has no avatar', function () {
    $html = shell(data: ['user' => ['name' => 'Camille', 'email' => 'camille@example.ch']]);

    expect($html)->toContain(__('shell.account_menu'))
        ->and($html)->toContain('camille@example.ch')
        ->and($html)->toContain('>C</span>');
});

it('points the logo at the site root without depending on a named route', function () {
    expect(shell())->toContain('href="'.url('/').'"');
});

it('takes its chrome from the active locale', function (string $locale) {
    app()->setLocale($locale);

    $html = shell(data: ['user' => ['name' => 'Camille']]);

    expect($html)->toContain(__('shell.skip_to'))
        ->and($html)->toContain(__('shell.main_menu'))
        ->and($html)->toContain(__('shell.nav.framework'))
        ->and($html)->toContain(__('shell.account.sign_out'));
})->with(['fr', 'de', 'it', 'en']);

it('carries no leftover kit palette classes or dark variants', function () {
    $html = shell(data: ['user' => ['name' => 'Camille']]);

    expect($html)->not->toContain('indigo')
        ->and($html)->not->toContain('dark:')
        ->and($html)->not->toContain('text-gray-');
});

it('renders the page in the default palette, leaving light or dark to the system', function () {
    expect(shell())->toContain('data-palette="'.Theme::default()->value.'"')
        ->and(shell())->not->toContain('data-theme=');
});

it('offers every palette in the picker, each previewing its own tokens', function () {
    $html = shell();

    foreach (Theme::cases() as $theme) {
        expect($html)->toContain('data-theme-option="'.$theme->value.'"')
            ->and($html)->toContain('data-palette="'.$theme->value.'"')
            ->and($html)->toContain($theme->summary());
    }
});

it('offers system, light and dark on an axis of their own', function () {
    $html = shell();

    foreach (Appearance::cases() as $appearance) {
        expect($html)->toContain('data-theme-option="'.$appearance->value.'"')
            ->and($html)->toContain($appearance->summary());
    }

    // One checked row per axis, never one overall.
    expect(substr_count($html, 'aria-checked="true"'))->toBe(3);
});

it('renders the palette, the appearance and the contrast it is given', function () {
    $html = shell(data: ['palette' => Theme::Vellum, 'appearance' => Appearance::Dark, 'contrast' => Contrast::High]);

    expect($html)->toContain('<html lang="fr" class="h-full" data-palette="vellum" data-theme="dark" data-contrast="high">');
});

it('offers normal and raised contrast on an axis of their own', function () {
    $html = shell();

    foreach (Contrast::cases() as $contrast) {
        expect($html)->toContain('data-theme-option="'.$contrast->value.'"')
            ->and($html)->toContain($contrast->summary());
    }

    expect($html)->toContain('data-theme-axis="contrast"')
        ->and($html)->not->toContain('data-contrast=');
});
