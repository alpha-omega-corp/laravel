<?php

namespace Workbench\App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;

use function Orchestra\Testbench\package_path;
use function Orchestra\Testbench\workbench_path;

/**
 * The showcase runs on Testbench's skeleton application. This points that
 * application at the workbench's own public directory, views and strings, and at
 * the kit exactly as the package ships it — the views and strings `ui:kit` copies.
 */
class WorkbenchServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->usePublicPath(workbench_path('public'));
        $this->app->useLangPath(workbench_path('lang'));
    }

    public function boot(): void
    {
        $this->loadTranslationsFrom(package_path('lang'));

        // A second server beside `composer dev` serves the built assets rather than the dev server's: what a
        // screenshot is taken from, since the dev server's font list is the one it started with. Testbench's
        // server has the skeleton's public folder as its root, so the build has to be linked into it first:
        // ln -s "$PWD/workbench/public/build" vendor/orchestra/testbench-core/laravel/public/build
        if (getenv('WORKBENCH_BUILT_ASSETS')) {
            Vite::useHotFile(storage_path('framework/no.hot'));
        }

        $this->callAfterResolving('view', function (Factory $view): void {
            $view->addLocation(workbench_path('resources/views'));
            $view->addLocation(package_path('resources/views'));
        });
    }
}
