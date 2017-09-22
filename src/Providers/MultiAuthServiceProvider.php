<?php

namespace Bmatovu\MultiAuth\Providers;

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
        # Configurations
        $this->publishes([
            __DIR__.'/../config/multi-auth.php' => config_path('multi-auth.php'),
        ]);

        # Migrations
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        # Routes
        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        # Views
        $this->loadViewsFrom(__DIR__.'/../views', 'multi-auth');

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
        $this->mergeConfigFrom(
            __DIR__.'/../config/multi-auth.php', 'auth'
        );

        # Middleware
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\HomeController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\ForgotPasswordController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\LoginController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\RegisterController');
        $this->app->make('Bmatovu\MultiAuth\Controllers\Admin\Auth\ResetPasswordController');

    }

    /**
     * Merge the given configuration with the existing configuration (Recursively)
     *
     * Source: https://github.com/laravel/framework/pull/16328
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key, array_merge_recursive(require $path, $config));
    }

}
