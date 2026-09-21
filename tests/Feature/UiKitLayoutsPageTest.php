<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

/**
 * Every reference in the kit's `layout` category, read from the kit itself so that a
 * component added there fails this test until the page shows it.
 *
 * @return array<int, string>
 */
function layoutReferences(): array
{
    return collect(File::allFiles(resource_path('views/components/ui/layout')))
        ->map(fn ($file): string => 'layout/'.str_replace(
            '.blade.php',
            '',
            str_replace(DIRECTORY_SEPARATOR, '/', $file->getRelativePathname()),
        ))
        ->sort()
        ->values()
        ->all();
}

it('serves the layouts page of the UI kit', function () {
    $this->get(route('layouts'))->assertOk();
});

it('shows every layout component the kit ships', function () {
    $html = $this->get(route('layouts'))->assertOk()->getContent();

    $references = layoutReferences();

    expect($references)->toHaveCount(38);

    foreach ($references as $reference) {
        expect($html)->toContain($reference);
    }
});

it('shows every application shell the kit ships', function () {
    $html = $this->get(route('layouts'))->assertOk()->getContent();

    $shells = collect(File::allFiles(resource_path('views/components/ui/application-shells')))
        ->map(fn ($file): string => 'application-shells/'.str_replace(
            '.blade.php',
            '',
            str_replace(DIRECTORY_SEPARATOR, '/', $file->getRelativePathname()),
        ))
        ->all();

    expect($shells)->toHaveCount(23);

    foreach ($shells as $shell) {
        expect($html)->toContain($shell);
    }
});

it('carries no leftover kit palette classes or dark variants', function () {
    $html = $this->get(route('layouts'))->assertOk()->getContent();

    expect($html)->not->toContain('indigo')
        ->and($html)->not->toContain('dark:')
        ->and($html)->not->toContain('text-gray-')
        ->and($html)->not->toContain('bg-gray-')
        ->and($html)->not->toContain('border-gray-')
        ->and($html)->not->toContain('divide-gray-');
});

it('titles the page in the active locale', function (string $locale) {
    app()->setLocale($locale);

    $this->get(route('layouts'))->assertOk()->assertSee(__('ui_kit.layouts.title', locale: $locale));
})->with(['fr', 'de', 'it', 'en']);
