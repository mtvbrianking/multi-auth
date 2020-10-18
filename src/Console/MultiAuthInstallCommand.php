<?php

namespace Bmatovu\MultiAuth\Console;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Log;

class MultiAuthInstallCommand extends Command
{

    protected $name = '';

    protected $exits = false;

    protected $override = false;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'multi-auth:install
                                {name=admin : Name of the guard.}
                                {--f|force : Whether to override existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install multi-auth package';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Initiating...');

        $progress = $this->output->createProgressBar(12);

        $this->name = $this->argument('name');

        $this->override = $this->option('force') ? true : false;

        // Check if guard is already registered
        if (array_key_exists(Str::singular(Str::snake($this->name)), config('auth.guards'))) {

            // Guard exists
            $this->exits = true;

            if (!$this->option('force')) {
                $this->info("Guard: '" . $this->name . "' is already registered");
                if (!$this->confirm('Force override resources...?')) {
                    $this->info(PHP_EOL . 'Halting scaffolding, try again with a another guard name...');
                    // throw new \RuntimeException("Halting installation, choose another guard name...");
                }
                // Override resources
                $this->override = true;
            }
        }

        $this->info("Using guard: '" . $this->name . "'");

        $progress->advance();

        // Configurations
        $this->info(PHP_EOL . 'Registering configurations...');

        if ($this->exits && $this->override) {
            $this->info('Configurations registration skipped');
        } else {
            $this->registerConfigurations(__DIR__ . '/../../stubs');
            $this->info('Configurations registered in ' . config_path('auth.php'));
        }

        $progress->advance();

        // Models
        $this->info(PHP_EOL . 'Creating Model...');

        $model_path = $this->loadModel(__DIR__ . '/../../stubs');

        $this->info('Model created at ' . $model_path);

        $progress->advance();

        // Factories
        $this->info(PHP_EOL . 'Creating Factory...');

        $factory_path = $this->loadFactory(__DIR__ . '/../../stubs');

        $this->info('Factory created at ' . $factory_path);

        $progress->advance();

        // Notifications
        $this->info(PHP_EOL . 'Creating Notification...');

        $notification_path = $this->loadNotification(__DIR__ . '/../../stubs');

        $this->info('Notification created at ' . $notification_path);

        $progress->advance();

        // Migrations
        $this->info(PHP_EOL . 'Creating Migrations...');

        if ($this->exits && $this->override) {
            $this->info('Migrations\' creation skipped');
        } else {
            $migrations_path = $this->loadMigrations(__DIR__ . '/../../stubs');
            $this->info('Migrations created at ' . $migrations_path);
        }

        $progress->advance();

        // Controllers
        $this->info(PHP_EOL . 'Creating Controllers...');

        $controllers_path = $this->loadControllers(__DIR__ . '/../../stubs');

        $this->info('Controllers created at ' . $controllers_path);

        $progress->advance();

        // Views
        $this->info(PHP_EOL . 'Creating Views...');

        $views_path = $this->loadViews(__DIR__ . '/../../stubs');

        $this->info('Views created at ' . $views_path);

        $progress->advance();

        // Routes
        $this->info(PHP_EOL . 'Creating Routes...');

        $routes_path = $this->loadRoutes(__DIR__ . '/../../stubs');

        $this->info('Routes created at ' . $routes_path);

        $progress->advance();

        // Routes Service Provider
        $this->info(PHP_EOL . 'Registering Routes Service Provider...');

        if ($this->exits && $this->override) {
            $this->info('Routes service provider registration skipped');
        } else {
            $routes_sp_path = $this->registerRoutes(__DIR__ . '/../../stubs');
            $this->info('Routes registered in service provider: ' . $routes_sp_path);
        }

        $progress->advance();

        // Middleware
        $this->info(PHP_EOL . 'Creating Middleware...');

        $middleware_path = $this->loadMiddleware(__DIR__ . '/../../stubs');

        $this->info('Middleware created at ' . $middleware_path);

        $progress->advance();

        // Route Middleware
        $this->info(PHP_EOL . 'Registering route middleware...');

        if ($this->exits && $this->override) {
            $this->info('Route middleware registration skipped');
        } else {
            $kernel_path = $this->registerRouteMiddleware(__DIR__ . '/../../stubs');
            $this->info('Route middleware registered in ' . $kernel_path);
        }

        $progress->finish();

        $this->info(PHP_EOL . 'Installation complete.');
    }

    /**
     * Get project namespace
     * Default: App
     * @return string
     */
    protected function getNamespace()
    {
        $namespace = Container::getInstance()->getNamespace();
        return rtrim($namespace, '\\');
    }

    /**
     * Parse guard name
     * Get the guard name in different cases
     * @param string $name
     * @return array
     */
    protected function parseName($name = null)
    {
        if (!$name)
            $name = $this->name;

        return $parsed = [
            '{{namespace}}' => $this->getNamespace(),
            '{{pluralCamel}}' => Str::plural(Str::camel($name)),
            '{{pluralSlug}}' => Str::plural(Str::slug($name)),
            '{{pluralSnake}}' => Str::plural(Str::snake($name)),
            '{{pluralClass}}' => Str::plural(Str::studly($name)),
            '{{singularCamel}}' => Str::singular(Str::camel($name)),
            '{{singularSlug}}' => Str::singular(Str::slug($name)),
            '{{singularSnake}}' => Str::singular(Str::snake($name)),
            '{{singularClass}}' => Str::singular(Str::studly($name)),
        ];
    }

    /**
     * Register configurations
     * Add guard configurations to config/auth.php
     * @param $stub_path
     */
    protected function registerConfigurations($stub_path)
    {
        try {

            $auth = file_get_contents(config_path('auth.php'));

            $data_map = $this->parseName();

            /********** Guards **********/

            $guards = file_get_contents($stub_path . '/config/guards.stub');

            // compile stub...
            $guards = strtr($guards, $data_map);

            $guards_bait = "'guards' => [";

            $auth = str_replace($guards_bait, $guards_bait . $guards, $auth);

            /********** Providers **********/

            $providers = file_get_contents($stub_path . '/config/providers.stub');

            // compile stub...
            $providers = strtr($providers, $data_map);

            $providers_bait = "'providers' => [";

            $auth = str_replace($providers_bait, $providers_bait . $providers, $auth);

            /********** Passwords **********/

            $passwords = file_get_contents($stub_path . '/config/passwords.stub');

            // compile stub...
            $passwords = strtr($passwords, $data_map);

            $passwords_bait = "'passwords' => [";

            $auth = str_replace($passwords_bait, $passwords_bait . $passwords, $auth);

            // Overwrite config file
            file_put_contents(config_path('auth.php'), $auth);

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Load model
     * @param $stub_path
     * @return string
     */
    protected function loadModel($stub_path)
    {
        try {

            $stub = file_get_contents($stub_path . '/model.stub');

            $data_map = $this->parseName();

            $model = strtr($stub, $data_map);

            $model_path = app_path('Models/' . $data_map['{{singularClass}}'] . '.php');

            file_put_contents($model_path, $model);

            return $model_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Load factory
     * @param $stub_path
     * @return string
     */
    protected function loadFactory($stub_path)
    {
        try {

            $stub = file_get_contents($stub_path . '/factory.stub');

            $data_map = $this->parseName();

            $factory = strtr($stub, $data_map);

            $factory_path = database_path('factories/' . $data_map['{{singularClass}}'] . 'Factory.php');

            file_put_contents($factory_path, $factory);

            return $factory_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Load notification
     * @param $stub_path
     * @return string
     */
    protected function loadNotification($stub_path)
    {
        try {

            $data_map = $this->parseName();

            $notifications_path = app_path('/Notifications/' . $data_map['{{singularClass}}'] . '/Auth');

            $notifications = array(
                [
                    'stub' => $stub_path . '/Notifications/ResetPassword.stub',
                    'path' => $notifications_path . '/ResetPassword.php',
                ],
                [
                    'stub' => $stub_path . '/Notifications/VerifyEmail.stub',
                    'path' => $notifications_path . '/VerifyEmail.php',
                ],
            );

            foreach ($notifications as $notification) {
                $stub = file_get_contents($notification['stub']);
                $complied = strtr($stub, $data_map);

                $dir = dirname($notification['path']);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                file_put_contents($notification['path'], $complied);
            }

            return $notifications_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Load migrations
     * @param $stub_path
     * @return string
     */
    protected function loadMigrations($stub_path)
    {
        try {

            $data_map = $this->parseName();

            $signature = date('Y_m_d_His');

            $migrations = array(
                [
                    'stub' => $stub_path . '/migrations/provider.stub',
                    'path' => database_path('migrations/' . $signature . '_create_' . $data_map['{{pluralSnake}}'] . '_table.php'),
                ],
                [
                    'stub' => $stub_path . '/migrations/password_resets.stub',
                    'path' => database_path('migrations/' . $signature . '_create_' . $data_map['{{singularSnake}}'] . '_password_resets_table.php'),
                ],
            );

            foreach ($migrations as $migration) {
                $stub = file_get_contents($migration['stub']);
                $complied = strtr($stub, $data_map);

                $dir = dirname($migration['path']);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                file_put_contents($migration['path'], $complied);
            }

            return database_path('migrations');

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Load controllers
     * @param $stub_path
     * @return string
     */
    protected function loadControllers($stub_path)
    {
        $data_map = $this->parseName();

        $guard = $data_map['{{singularClass}}'];

        $controllers_path = app_path('/Http/Controllers/' . $guard);

        $controllers = array(
            [
                'stub' => $stub_path . '/Controllers/HomeController.stub',
                'path' => $controllers_path . '/HomeController.php',
            ],
            [
                'stub' => $stub_path . '/Controllers/Auth/ForgotPasswordController.stub',
                'path' => $controllers_path . '/Auth/ForgotPasswordController.php',
            ],
            [
                'stub' => $stub_path . '/Controllers/Auth/LoginController.stub',
                'path' => $controllers_path . '/Auth/LoginController.php',
            ],
            [
                'stub' => $stub_path . '/Controllers/Auth/RegisterController.stub',
                'path' => $controllers_path . '/Auth/RegisterController.php',
            ],
            [
                'stub' => $stub_path . '/Controllers/Auth/ResetPasswordController.stub',
                'path' => $controllers_path . '/Auth/ResetPasswordController.php',
            ],
            [
                'stub' => $stub_path . '/Controllers/Auth/VerificationController.stub',
                'path' => $controllers_path . '/Auth/VerificationController.php',
            ],
            [
                'stub' => $stub_path . '/Controllers/Auth/ConfirmPasswordController.stub',
                'path' => $controllers_path . '/Auth/ConfirmPasswordController.php',
            ],
        );

        foreach ($controllers as $controller) {
            $stub = file_get_contents($controller['stub']);
            $complied = strtr($stub, $data_map);

            $dir = dirname($controller['path']);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            file_put_contents($controller['path'], $complied);
        }

        return $controllers_path;
    }

    /**
     * Load views
     * @param $stub_path
     * @return string
     */
    protected function loadViews($stub_path)
    {
        $data_map = $this->parseName();

        $guard = $data_map['{{singularSlug}}'];

        $views_path = resource_path('views/' . $guard);

        $views = array(
            [
                'stub' => $stub_path . '/views/home.blade.stub',
                'path' => $views_path . '/home.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/layouts/app.blade.stub',
                'path' => $views_path . '/layouts/app.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/login.blade.stub',
                'path' => $views_path . '/auth/login.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/register.blade.stub',
                'path' => $views_path . '/auth/register.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/verify.blade.stub',
                'path' => $views_path . '/auth/verify.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/passwords/email.blade.stub',
                'path' => $views_path . '/auth/passwords/email.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/passwords/reset.blade.stub',
                'path' => $views_path . '/auth/passwords/reset.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/passwords/confirm.blade.stub',
                'path' => $views_path . '/auth/passwords/confirm.blade.php',
            ],
        );

        foreach ($views as $view) {
            $stub = file_get_contents($view['stub']);
            $complied = strtr($stub, $data_map);

            $dir = dirname($view['path']);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            file_put_contents($view['path'], $complied);
        }

        return $views_path;
    }

    /**
     * Load routes
     * @param $stub_path
     * @return string
     */
    protected function loadRoutes($stub_path)
    {
        $data_map = $this->parseName();

        $guard = $data_map['{{singularSlug}}'];

        $routes_path = base_path('/routes/' . $guard . '.php');

        $routes = array(
            'stub' => $stub_path . '/routes/routes.stub',
            'path' => $routes_path,
        );

        $stub = file_get_contents($routes['stub']);
        $complied = strtr($stub, $data_map);

        file_put_contents($routes['path'], $complied);

        return $routes_path;
    }

    /**
     * Register routes
     * @param $stub_path
     * @return string
     */
    protected function registerRoutes($stub_path)
    {
        try {

            $provider_path = app_path('Providers/RouteServiceProvider.php');

            $provider = file_get_contents($provider_path);

            $data_map = $this->parseName();

            /********** Boot **********/

            $map = file_get_contents($stub_path . '/routes/map.stub');

            $map = strtr($map, $data_map);

            $map_bait = "                ->group(base_path('routes/web.php'));";

            $provider = str_replace($map_bait, $map_bait . $map, $provider);

            // Overwrite config file
            file_put_contents($provider_path, $provider);

            return $provider_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Load middleware
     * @param $stub_path
     * @return string
     */
    protected function loadMiddleware($stub_path)
    {
        try {

            $data_map = $this->parseName();

            $middleware_path = app_path('Http/Middleware');

            $middlewares = array(
                [
                    'stub' => $stub_path . '/Middleware/RedirectIfAuthenticated.stub',
                    'path' => $middleware_path . '/RedirectIf' . $data_map['{{singularClass}}'] . '.php',
                ],
                [
                    'stub' => $stub_path . '/Middleware/RedirectIfNotAuthenticated.stub',
                    'path' => $middleware_path . '/RedirectIfNot' . $data_map['{{singularClass}}'] . '.php',
                ],
                [
                    'stub' => $stub_path . '/Middleware/EnsureEmailIsVerified.stub',
                    'path' => $middleware_path . '/Ensure' . $data_map['{{singularClass}}'] . 'EmailIsVerified.php',
                ],
                [
                    'stub' => $stub_path . '/Middleware/RequirePassword.stub',
                    'path' => $middleware_path . '/Require' . $data_map['{{singularClass}}'] . 'Password.php',
                ],
            );

            foreach ($middlewares as $middleware) {
                $stub = file_get_contents($middleware['stub']);
                file_put_contents($middleware['path'], strtr($stub, $data_map));
            }

            return $middleware_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    /**
     * Register middleware
     * @param $stub_path
     * @return string
     */
    protected function registerRouteMiddleware($stub_path)
    {
        try {

            $data_map = $this->parseName();

            $kernel_path = app_path('Http/Kernel.php');

            $kernel = file_get_contents($kernel_path);

            /********** Route Middleware **********/

            $route_mw = file_get_contents($stub_path . '/Middleware/Kernel.stub');

            $route_mw = strtr($route_mw, $data_map);

            $route_mw_bait = 'protected $routeMiddleware = [';

            $kernel = str_replace($route_mw_bait, $route_mw_bait . $route_mw, $kernel);

            // Overwrite config file
            file_put_contents($kernel_path, $kernel);

            return $kernel_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

}
