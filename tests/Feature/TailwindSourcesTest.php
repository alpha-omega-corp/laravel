<?php

declare(strict_types=1);
use Illuminate\Support\Facades\File;

/*
 * resources/css/app.css registers its sources explicitly — `source(none)` —
 * so that the 364 verbatim kit components under views/components/ui are not
 * scanned. The cost of that is silent: a view directory nobody adds to the list
 * renders with classes Tailwind never compiled, and the page merely looks wrong.
 * This is the check that the list is complete.
 */

it('registers every application view as a Tailwind source', function () {
    $css = file_get_contents(resource_path('css/app.css'));

    preg_match_all("/@source '(\\.\\.\\/[^']+)'/", $css, $matches);

    $sources = array_map(
        fn (string $path): string => (string) realpath(resource_path('css/'.$path)),
        $matches[1],
    );

    $views = collect(File::allFiles(resource_path('views')))
        ->filter(fn ($file): bool => $file->getExtension() === 'php')
        ->map(fn ($file): string => $file->getRealPath())
        // The shared kit is excluded on purpose: see the comment at the head of app.css.
        ->reject(fn (string $path): bool => str_contains($path, '/views/components/ui/'));

    $unscanned = $views->reject(fn (string $path): bool => collect($sources)
        ->contains(fn (string $source): bool => $source === $path || str_starts_with($path, $source.'/')));

    expect($unscanned->values()->all())->toBe([]);
});
