<?php

namespace App\Modules\{{pluralClass}};

use App\Modules\{{pluralClass}}\Auth\{{singularClass}}Guard;
use App\Modules\{{pluralClass}}\Auth\{{singularClass}}UserProvider;
use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class {{singularClass}}ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/{{singularSnake}}.php');
        // $this->loadViewsFrom(__DIR__.'/resources/views', '{{singularSlug}}');

        Blade::component('{{singularSlug}}-app-layout', View\Components\{{singularClass}}AppLayout::class);
        Blade::component('{{singularSlug}}-guest-layout', View\Components\{{singularClass}}GuestLayout::class);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerMiddleware();
        $this->injectAuthConfiguration();
        $this->registerAuthDrivers('{{pluralSlug}}', '{{singularSlug}}', {{singularClass}}::class);
    }

    /**
     * @see https://laracasts.com/discuss/channels/general-discussion/register-middleware-via-service-provider
     */
    protected function registerMiddleware()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('{{singularSlug}}.auth', Http\Middleware\RedirectIfNot{{singularClass}}::class);
        $router->aliasMiddleware('{{singularSlug}}.guest', Http\Middleware\RedirectIf{{singularClass}}::class);
        $router->aliasMiddleware('{{singularSlug}}.verified', Http\Middleware\Ensure{{singularClass}}EmailIsVerified::class);
        $router->aliasMiddleware('{{singularSlug}}.password.confirm', Http\Middleware\Require{{singularClass}}Password::class);
    }

    /**
     * @see \Illuminate\Auth\AuthManager
     * @see https://www.devrohit.com/custom-authentication-in-laravel
     */
    protected function registerAuthDrivers(string $provider, string $guard, string $model)
    {
        Auth::provider('{{singularSnake}}_provider_driver', function ($app) use ($model) {
            return new {{singularClass}}UserProvider($app['hash'], $model);
        });

        /* AuthManager->createSessionDriver() */
        Auth::extend('{{singularSnake}}_guard_driver', function ($app) use ($provider, $guard) {
            $userProvider = Auth::createUserProvider($provider);

            ${{singularCamel}}Guard = new {{singularClass}}Guard($guard, $userProvider, $app['session.store']);

            if (method_exists(${{singularCamel}}Guard, 'setCookieJar')) {
                ${{singularCamel}}Guard->setCookieJar($this->app['cookie']);
            }

            if (method_exists(${{singularCamel}}Guard, 'setDispatcher')) {
                ${{singularCamel}}Guard->setDispatcher($this->app['events']);
            }

            if (method_exists(${{singularCamel}}Guard, 'setRequest')) {
                ${{singularCamel}}Guard->setRequest($this->app->refresh('request', ${{singularCamel}}Guard, 'setRequest'));
            }

            if (isset($config['remember'])) {
                ${{singularCamel}}Guard->setRememberDuration($config['remember']);
            }

            return ${{singularCamel}}Guard;
        });
    }

    protected function injectAuthConfiguration()
    {
        $this->app['config']->set('auth.guards.{{singularSlug}}', [
            // 'driver' => 'session',
            'driver' => '{{singularSnake}}_guard_driver',
            'provider' => '{{pluralSlug}}',
        ]);

        $this->app['config']->set('auth.providers.{{pluralSlug}}', [
            // 'driver' => 'eloquent',
            'driver' => '{{singularSnake}}_provider_driver',
            'model' => Models\{{singularClass}}::class,
        ]);

        $this->app['config']->set('auth.passwords.{{pluralSlug}}', [
            'provider' => '{{pluralSlug}}',
            'table' => '{{singularSnake}}_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ]);
    }
}
