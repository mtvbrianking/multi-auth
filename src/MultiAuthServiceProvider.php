<?php

namespace Bmatovu\MultiAuth;

use Bmatovu\MultiAuth\Console\MultiAuthInstallCommand;
use Illuminate\Support\ServiceProvider;

class MultiAuthServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MultiAuthInstallCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // ...
    }

}
