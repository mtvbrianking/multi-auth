<?php

namespace App\Modules\{{pluralClass}};

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
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerMiddleware();
        $this->injectAuthConfiguration();
    }

    /**
     * @see https://laracasts.com/discuss/channels/general-discussion/register-middleware-via-service-provider
     */
    protected function registerMiddleware()
    {
        $router = $this->app['router'];
        $router->middlewareGroup('{{singularSlug}}', [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Modules\{{pluralClass}}\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);
        $router->aliasMiddleware('{{singularSlug}}.auth', Http\Middleware\RedirectIfNot{{singularClass}}::class);
        $router->aliasMiddleware('{{singularSlug}}.guest', Http\Middleware\RedirectIf{{singularClass}}::class);
        $router->aliasMiddleware('{{singularSlug}}.verified', Http\Middleware\Ensure{{singularClass}}EmailIsVerified::class);
        $router->aliasMiddleware('{{singularSlug}}.password.confirm', Http\Middleware\Require{{singularClass}}Password::class);
    }

    protected function injectAuthConfiguration()
    {
        $this->app['config']->set('auth.guards.{{singularSlug}}', [
            'driver' => 'session',
            'provider' => '{{pluralSlug}}',
        ]);

        $this->app['config']->set('auth.providers.{{pluralSlug}}', [
            'driver' => 'eloquent',
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
