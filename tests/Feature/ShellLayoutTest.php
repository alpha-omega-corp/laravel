<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Vite;

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

function shell(string $slot = '<p>Contenu</p>', array $data = []): string
{
    return Blade::render(
        '<x-layouts.shell :title="$title" :nav="$nav" :user="$user">'.$slot.'</x-layouts.shell>',
        $data + ['title' => 'Tableau de bord', 'nav' => [], 'user' => null],
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
        ->and($html)->toContain(__('shell.nav.dashboard'))
        ->and($html)->toContain(__('shell.account.sign_out'));
})->with(['fr', 'de', 'it', 'en']);

it('carries no leftover kit palette classes or dark variants', function () {
    $html = shell(data: ['user' => ['name' => 'Camille']]);

    expect($html)->not->toContain('indigo')
        ->and($html)->not->toContain('dark:')
        ->and($html)->not->toContain('text-gray-');
});
