<?php

namespace App\Modules\{{pluralClass}};

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
