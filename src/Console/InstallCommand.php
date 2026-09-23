<?php

namespace AlphaOmega\UiKit\Console;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Copies the kit into the application, at the same paths it has in this package.
 *
 * With no argument that is the themed kit: the x-kit components, the stylesheet
 * holding the palettes they read, and their strings. With a reference it is one
 * raw Tailwind Plus component from resources/views/components/ui, which arrives
 * in the default palette and is the application's to re-theme.
 */
#[Signature('ui:kit
    {reference? : One raw kit component to copy instead, e.g. layout/cards/01-basic-card}
    {--force : Overwrite files that already exist}')]
#[Description('Install the themed UI kit, or copy one raw kit component by reference')]
class InstallCommand extends Command
{
    /**
     * Files left alone because the application already has them.
     *
     * @var list<string>
     */
    private array $skipped = [];

    public function handle(Filesystem $files): int
    {
        $reference = $this->argument('reference');

        $status = is_string($reference)
            ? $this->installReference($files, $reference)
            : $this->installKit($files);

        if ($this->skipped !== []) {
            $this->components->warn('Kept the application\'s own copy of these; pass --force to overwrite them:');
            $this->components->bulletList($this->skipped);
        }

        return $status;
    }

    private function installKit(Filesystem $files): int
    {
        $paths = [
            ...$this->packageFiles($files, 'resources/views/components/kit'),
            'resources/css/kit.css',
            'resources/css/themes.css',
            ...$this->packageFiles($files, 'lang'),
        ];

        foreach ($paths as $path) {
            $this->copy($files, $path);
        }

        $this->addToStylesheet($files, "@import './kit.css';");

        $this->components->info('The UI kit is installed: <x-kit.button>, <x-kit.alert> and the rest are ready to use');
        $this->components->bulletList([
            'Pick a palette with data-palette on <html> (orchard, sandstone, harbour, graphite, blossom, fresh or vellum). Without one it is orchard.',
            'Each palette names its typefaces as --font-* variables: load them with bunny() in vite.config.js and @fonts in the layout.',
            '<x-kit.dropdown> needs Tailwind Plus Elements: npm install @tailwindplus/elements, then import it in resources/js/app.js.',
        ]);

        return self::SUCCESS;
    }

    private function installReference(Filesystem $files, string $reference): int
    {
        $reference = Str::of($reference)->after('::')->before('.blade.php')->trim('/')->value();

        $components = (new Collection($files->allFiles($this->packagePath('resources/views/components/ui'))))
            ->map(fn (SplFileInfo $file): string => Str::before($file->getRelativePathname(), '.blade.php'));

        $matches = $components->contains($reference)
            ? new Collection([$reference])
            : $components->filter(fn (string $component): bool => str_contains($component, $reference))->sort()->values();

        if ($matches->count() !== 1) {
            $this->components->error($matches->isEmpty()
                ? "No kit component matches [{$reference}]."
                : "[{$reference}] matches {$matches->count()} kit components; pass one of these:");
            $this->components->bulletList($matches->all());

            return self::FAILURE;
        }

        $component = $matches->first();

        $this->copy($files, "resources/views/components/ui/{$component}.blade.php");
        // Applications built on the kit import Tailwind with source(none): a directory
        // nobody registers renders with classes that were never compiled.
        $this->addToStylesheet($files, "@source '../views/components/ui';");

        $this->components->info('Copied as <x-ui.'.str_replace('/', '.', $component).' />.');
        $this->components->warn('It is in Tailwind\'s default palette, with dark: variants: re-theme it to the kit\'s tokens.');

        return self::SUCCESS;
    }

    /**
     * Copy one file to the same path in the application, unless it already has one.
     */
    private function copy(Filesystem $files, string $path): void
    {
        $target = base_path($path);

        if ($files->exists($target) && ! $this->option('force')) {
            $this->skipped[] = $path;

            return;
        }

        $files->ensureDirectoryExists(dirname($target));
        $files->copy($this->packagePath($path), $target);
    }

    /**
     * Add a line to the application's stylesheet, once.
     *
     * An import has to come before any other rule, so it goes straight after
     * Tailwind's; anything else goes at the end.
     */
    private function addToStylesheet(Filesystem $files, string $line): void
    {
        $stylesheet = base_path('resources/css/app.css');

        if (! $files->exists($stylesheet)) {
            $this->components->warn("There is no resources/css/app.css: add {$line} to your stylesheet.");

            return;
        }

        $css = $files->get($stylesheet);

        if (str_contains($css, $line)) {
            return;
        }

        if (! str_starts_with($line, '@import')) {
            $files->append($stylesheet, "\n{$line}\n");

            return;
        }

        $css = preg_replace("/^@import\\s+['\"]tailwindcss['\"][^;]*;\\R/m", "\$0{$line}\n", $css, 1, $count);

        if ($count === 0 || ! is_string($css)) {
            $this->components->warn("resources/css/app.css does not import Tailwind: add {$line} after it.");

            return;
        }

        $files->put($stylesheet, $css);
    }

    /**
     * Every file under a directory of this package, as paths relative to its root.
     *
     * @return array<int, string>
     */
    private function packageFiles(Filesystem $files, string $directory): array
    {
        return array_map(
            fn (SplFileInfo $file): string => $directory.'/'.str_replace('\\', '/', $file->getRelativePathname()),
            $files->allFiles($this->packagePath($directory)),
        );
    }

    private function packagePath(string $path): string
    {
        return dirname(__DIR__, 2).'/'.$path;
    }
}
