<?php

namespace Workbench\App\Providers;

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

        $this->callAfterResolving('view', function (Factory $view): void {
            $view->addLocation(workbench_path('resources/views'));
            $view->addLocation(package_path('resources/views'));
        });
    }
}
