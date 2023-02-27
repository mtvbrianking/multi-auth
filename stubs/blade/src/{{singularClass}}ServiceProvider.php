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
        $this->loadRoutesFrom(__DIR__.'/routes/{{singularSlug}}.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', '{{singularSlug}}');

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
        Auth::provider('{{singularSlug}}_provider_driver', function ($app) use ($model) {
            return new {{singularClass}}UserProvider($app['hash'], $model);
        });

        /* AuthManager->createSessionDriver() */
        Auth::extend('{{singularSlug}}_guard_driver', function ($app) use ($provider, $guard) {
            $userProvider = Auth::createUserProvider($provider);

            ${{singularSlug}}Guard = new {{singularClass}}Guard($guard, $userProvider, $app['session.store']);

            if (method_exists(${{singularSlug}}Guard, 'setCookieJar')) {
                ${{singularSlug}}Guard->setCookieJar($this->app['cookie']);
            }

            if (method_exists(${{singularSlug}}Guard, 'setDispatcher')) {
                ${{singularSlug}}Guard->setDispatcher($this->app['events']);
            }

            if (method_exists(${{singularSlug}}Guard, 'setRequest')) {
                ${{singularSlug}}Guard->setRequest($this->app->refresh('request', ${{singularSlug}}Guard, 'setRequest'));
            }

            if (isset($config['remember'])) {
                ${{singularSlug}}Guard->setRememberDuration($config['remember']);
            }

            return ${{singularSlug}}Guard;
        });
    }

    protected function injectAuthConfiguration()
    {
        $this->app['config']->set('auth.guards.{{singularSlug}}', [
            // 'driver' => 'session',
            'driver' => '{{singularSlug}}_guard_driver',
            'provider' => '{{pluralSlug}}',
        ]);

        $this->app['config']->set('auth.providers.{{pluralSlug}}', [
            // 'driver' => 'eloquent',
            'driver' => '{{singularSlug}}_provider_driver',
            'model' => Models\{{singularClass}}::class,
        ]);

        $this->app['config']->set('auth.passwords.{{pluralSlug}}', [
            'provider' => '{{pluralSlug}}',
            'table' => '{{singularSlug}}_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ]);
    }
}
