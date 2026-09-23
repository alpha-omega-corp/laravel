<?php

namespace AlphaOmega\UiKit;

use AlphaOmega\UiKit\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class UiKitServiceProvider extends ServiceProvider
{
    /**
     * The package only installs: once the files are copied they are the
     * application's, so nothing here is loaded at runtime.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([InstallCommand::class]);
        }
    }
}
