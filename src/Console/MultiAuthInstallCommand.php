<?php

namespace Bmatovu\MultiAuth\Console;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Log;

class MultiAuthInstallCommand extends Command
{

    protected $name = '';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'multi-auth:install
                                {name=admin : Name of the guard}
                                {--f|force : Whether to override existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install multi-auth package';

    /**
     * Create a new command instance.
     *
     * @return void
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

        $this->name = $this->argument('name');

        if ($this->name == 'admin') {
            $this->info('Using default guard: \'admin\'');
        }

        /* Configurations

        $this->info('Loading configurations...');

        $this->loadConfig(__DIR__ . '/../../stubs');

        $this->info('Configurations loaded to ' . config_path('auth.php'));
        */

        /* Models

        $this->info('Creating Model...');

        $model_path = $this->loadModel(__DIR__ . '/../../stubs');

        $this->info('Model created at ' . $model_path);
        */

        /* Migrations

        $this->info('Creating Migration...');

        $model_path = $this->loadMigration(__DIR__ . '/../../stubs');

        $this->info('Migration created at ' . $model_path);
        */

        /* Controllers
        $this->info('Creating Controllers...');

        $controllers_path = $this->loadControllers(__DIR__ . '/../../stubs');

        $this->info('Controllers created at ' . $controllers_path);
        */

        // Views
        $this->info('Creating Views...');

        $views_path = $this->loadViews(__DIR__ . '/../../stubs');

        $this->info('Views created at ' . $views_path);

        // ...

        $this->info('Installation complete.');
    }

    protected function get_namespace()
    {
        $namespace = Container::getInstance()->getNamespace();
        return rtrim($namespace, '\\');
    }

    protected function parseName($name = null)
    {
        if (!$name)
            $name = $this->name;

        return $parsed = array(
            '{{pluralCamel}}' => str_plural(camel_case($name)),
            '{{pluralSlug}}' => str_plural(str_slug($name)),
            '{{pluralSnake}}' => str_plural(snake_case($name)),
            '{{pluralClass}}' => str_plural(studly_case($name)),
            '{{singularCamel}}' => str_singular(camel_case($name)),
            '{{singularSlug}}' => str_singular(str_slug($name)),
            '{{singularSnake}}' => str_singular(snake_case($name)),
            '{{singularClass}}' => str_singular(studly_case($name)),
        );
    }

    protected function loadConfig($stub_path)
    {
        try {

            $auth = file_get_contents(config_path('auth.php'));

            $data_map = $this->parseName();

            $data_map['{{namespace}}'] = $this->get_namespace();

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

    protected function loadModel($stub_path)
    {
        try {

            $stub = file_get_contents($stub_path . '/Model.stub');

            $data_map = $this->parseName();

            $data_map['{{namespace}}'] = $this->get_namespace();

            $model = strtr($stub, $data_map);

//            $model_path = app_path() . '/' . $data_map['{{pluralClass}}'] . '.php';
            $model_path = app_path($data_map['{{pluralClass}}'] . '.php');

            file_put_contents($model_path, $model);

            return $model_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    protected function loadMigration($stub_path)
    {
        try {

            $stub = file_get_contents($stub_path . '/migration.stub');

            $data_map = $this->parseName();

            $data_map['{{namespace}}'] = $this->get_namespace();

            $migration = strtr($stub, $data_map);

            $signature = date('Y_m_d_His');

            $migration_path = database_path('migrations/' . $signature . '_create_' . $data_map['{{pluralSnake}}'] . '_table.php');

            file_put_contents($migration_path, $migration);

            return $migration_path;

        } catch (Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
    }

    protected function loadControllers($stub_path)
    {
        $data_map = $this->parseName();

        $data_map['{{namespace}}'] = $this->get_namespace();

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
            ]
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

    protected function loadViews($stub_path)
    {
        $data_map = $this->parseName();

        $data_map['{{namespace}}'] = $this->get_namespace();

        $guard = $data_map['{{pluralSnake}}'];

        $views_path = resource_path('views/vendor/multi-auth/' . $guard);

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
                'stub' => $stub_path . '/views/auth/passwords/email.blade.stub',
                'path' => $views_path . '/auth/passwords/email.blade.php',
            ],
            [
                'stub' => $stub_path . '/views/auth/passwords/reset.blade.stub',
                'path' => $views_path . '/auth/passwords/reset.blade.php',
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

    protected function loadMiddleware()
    {

    }

    protected function registerMiddleware()
    {

    }

    protected function registerRoutes()
    {

    }

}