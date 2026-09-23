<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

use function Orchestra\Testbench\package_path;

/*
 * `ui:kit` writes into the application it runs in, so each test gets an empty
 * one of its own rather than Testbench's shared skeleton.
 */
beforeEach(function () {
    $this->project = sys_get_temp_dir().'/ui-kit-'.uniqid();
    $this->app->setBasePath($this->project);

    File::ensureDirectoryExists($this->project.'/resources/css');
    File::put($this->project.'/resources/css/app.css', "@import 'tailwindcss' source(none);\n\n@source '../views';\n");
});

afterEach(function () {
    File::deleteDirectory($this->project);
});

/**
 * @return array<int, string>
 */
function relativeFiles(string $directory): array
{
    return collect(File::allFiles($directory))
        ->map(fn ($file): string => $file->getRelativePathname())
        ->sort()
        ->values()
        ->all();
}

it('installs every themed component, the stylesheet they read and their strings', function () {
    $this->artisan('ui:kit')->assertSuccessful();

    expect(relativeFiles($this->project.'/resources/views/components/kit'))
        ->toBe(relativeFiles(package_path('resources/views/components/kit')))
        ->and(relativeFiles($this->project.'/lang'))->toBe(relativeFiles(package_path('lang')))
        ->and($this->project.'/resources/css/kit.css')->toBeFile()
        ->and($this->project.'/resources/css/themes.css')->toBeFile()
        ->and($this->project.'/resources/views/components/ui')->not->toBeDirectory();
});

it('imports the kit straight after Tailwind, once however often it is installed', function () {
    $this->artisan('ui:kit')->assertSuccessful();
    $this->artisan('ui:kit', ['--force' => true])->assertSuccessful();

    expect(File::get($this->project.'/resources/css/app.css'))
        ->toBe("@import 'tailwindcss' source(none);\n@import './kit.css';\n\n@source '../views';\n");
});

it('keeps a component the application has edited unless forced', function () {
    $button = $this->project.'/resources/views/components/kit/button.blade.php';
    File::ensureDirectoryExists(dirname($button));
    File::put($button, 'edited');

    $this->artisan('ui:kit')
        ->expectsOutputToContain('resources/views/components/kit/button.blade.php')
        ->assertSuccessful();

    expect(File::get($button))->toBe('edited');

    $this->artisan('ui:kit', ['--force' => true])->assertSuccessful();

    expect(File::get($button))->toBe(File::get(package_path('resources/views/components/kit/button.blade.php')));
});

it('copies one raw component by reference and registers it as a Tailwind source', function (string $reference) {
    $this->artisan('ui:kit', ['reference' => $reference])
        ->expectsOutputToContain('<x-ui.layout.cards.08-well />')
        ->assertSuccessful();

    expect($this->project.'/resources/views/components/ui/layout/cards/08-well.blade.php')->toBeFile()
        ->and($this->project.'/resources/views/components/kit')->not->toBeDirectory()
        ->and(File::get($this->project.'/resources/css/app.css'))->toEndWith("\n@source '../views/components/ui';\n");
})->with([
    'exact reference' => '::layout/cards/08-well',
    'unique name' => '08-well',
]);

it('lists the candidates rather than guessing when a reference names several', function () {
    $this->artisan('ui:kit', ['reference' => 'card'])
        ->expectsOutputToContain('layout/cards/01-basic-card')
        ->assertFailed();

    expect($this->project.'/resources/views/components/ui')->not->toBeDirectory();
});

it('fails on a reference that names no component', function () {
    $this->artisan('ui:kit', ['reference' => 'no-such-component'])->assertFailed();

    expect($this->project.'/resources/views/components/ui')->not->toBeDirectory();
});
