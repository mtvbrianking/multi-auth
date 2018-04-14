<?php

namespace Bmatovu\MultiAuth\Providers;

use Bmatovu\MultiAuth\Console\MultiAuthInstallCommand;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class MultiAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        # Migrations
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        # Routes
        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        # Views
        $this->loadViewsFrom(__DIR__.'/../views', 'multi-auth');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MultiAuthInstallCommand::class,
            ]);
        }

        # Middleware
        $router->aliasMiddleware('admin', \Bmatovu\MultiAuth\Middleware\RedirectIfNotAdmin::class);
        $router->aliasMiddleware('admin.guest', \Bmatovu\MultiAuth\Middleware\RedirectIfAdmin::class);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        # Default Package Configuration
        $this->mergeConfigFrom(config_path('auth'), 'auth');

        # Controllers
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\HomeController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\ForgotPasswordController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\LoginController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\RegisterController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\ResetPasswordController');

    }

}
