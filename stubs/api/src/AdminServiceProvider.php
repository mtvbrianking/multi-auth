<?php

namespace App\Modules\Admins;

use App\Modules\Admins\Auth\AdminGuard;
use App\Modules\Admins\Auth\AdminUserProvider;
use App\Modules\Admins\Models\Admin;
use App\Modules\Admins\Notifications\Auth\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        // $this->loadViewsFrom(__DIR__ . '/resources/views', 'admin');

        // Blade::component('admin-app-layout', View\Components\AdminAppLayout::class);
        // Blade::component('admin-guest-layout', View\Components\AdminGuestLayout::class);

        // ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
        //     return config('app.frontend_url') . "/admin/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        // });
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerMiddleware();
        $this->injectAuthConfiguration();
        // $this->registerAuthDrivers('admins', 'admin', Admin::class);
    }

    /**
     * @see https://laracasts.com/discuss/channels/general-discussion/register-middleware-via-service-provider
     */
    protected function registerMiddleware()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('admin.auth', Http\Middleware\RedirectIfNotAdmin::class);
        $router->aliasMiddleware('admin.guest', Http\Middleware\RedirectIfAdmin::class);
        $router->aliasMiddleware('admin.verified', Http\Middleware\EnsureAdminEmailIsVerified::class);
        $router->aliasMiddleware('admin.password.confirm', Http\Middleware\RequireAdminPassword::class);
    }

    /**
     * @see \Illuminate\Auth\AuthManager
     * @see https://www.devrohit.com/custom-authentication-in-laravel
     */
    protected function registerAuthDrivers(string $provider, string $guard, string $model)
    {
        Auth::provider('admin_provider_driver', function ($app) use ($model) {
            return new AdminUserProvider($app['hash'], $model);
        });

        /* AuthManager->createSessionDriver() */
        Auth::extend('admin_guard_driver', function ($app) use ($provider, $guard) {
            $userProvider = Auth::createUserProvider($provider);

            $adminGuard = new AdminGuard($guard, $userProvider, $app['session.store']);

            if (method_exists($adminGuard, 'setCookieJar')) {
                $adminGuard->setCookieJar($this->app['cookie']);
            }

            if (method_exists($adminGuard, 'setDispatcher')) {
                $adminGuard->setDispatcher($this->app['events']);
            }

            if (method_exists($adminGuard, 'setRequest')) {
                $adminGuard->setRequest($this->app->refresh('request', $adminGuard, 'setRequest'));
            }

            if (isset($config['remember'])) {
                $adminGuard->setRememberDuration($config['remember']);
            }

            return $adminGuard;
        });
    }

    protected function injectAuthConfiguration()
    {
        $this->app['config']->set('auth.guards.admin', [
            'driver' => 'session',
            // 'driver' => 'admin_guard_driver',
            'provider' => 'admins',
        ]);

        $this->app['config']->set('auth.providers.admins', [
            'driver' => 'eloquent',
            // 'driver' => 'admin_provider_driver',
            'model' => Models\Admin::class,
        ]);

        $this->app['config']->set('auth.passwords.admins', [
            'provider' => 'admins',
            'table' => 'admin_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ]);
    }
}
