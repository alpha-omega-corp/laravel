<?php

declare(strict_types=1);
use Illuminate\Support\Facades\File;

use function Orchestra\Testbench\package_path;
use function Orchestra\Testbench\workbench_path;

/*
 * workbench/resources/css/app.css registers its sources explicitly — `source(none)` —
 * so that the 364 verbatim kit components under views/components/ui are not
 * scanned. The cost of that is silent: a view directory nobody adds to the list
 * renders with classes Tailwind never compiled, and the page merely looks wrong.
 * This is the check that the list is complete.
 */

it('registers every view as a Tailwind source', function () {
    // Each stylesheet registers sources relative to itself: the workbench's app.css its
    // own views, and the kit.css it imports the kit's.
    $sources = collect([workbench_path('resources/css/app.css'), package_path('resources/css/kit.css')])
        ->flatMap(function (string $stylesheet): array {
            preg_match_all("/@source '(\\.\\.\\/[^']+)'/", (string) file_get_contents($stylesheet), $matches);

            return array_map(fn (string $path): string => (string) realpath(dirname($stylesheet).'/'.$path), $matches[1]);
        });

    $views = collect([...File::allFiles(workbench_path('resources/views')), ...File::allFiles(package_path('resources/views'))])
        ->filter(fn ($file): bool => $file->getExtension() === 'php')
        ->map(fn ($file): string => $file->getRealPath())
        // The shared kit is excluded on purpose: see the comment at the head of app.css.
        ->reject(fn (string $path): bool => str_contains($path, '/views/components/ui/'));

    $unscanned = $views->reject(fn (string $path): bool => $sources
        ->contains(fn (string $source): bool => $source === $path || str_starts_with($path, $source.'/')));

    expect($unscanned->values()->all())->toBe([]);
});
