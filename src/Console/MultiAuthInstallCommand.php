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

        $this->info('Loading configurations...');

        $this->loadConfig(__DIR__ . '../../stubs');

        $this->info('Configurations loaded to ' . config_path('auth.php'));

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
            '{{pluralCamel}}' => camel_case($name),
            '{{pluralSlug}}' => str_slug($name),
            '{{pluralSnake}}' => snake_case($name),
            '{{pluralClass}}' => studly_case($name),
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
            // Handle exception
            Log::error(['multi-auth' => $ex->getMessage()]);
            return false;
        }

        return true;
    }

    protected function loadMiddleware()
    {

    }

    protected function registerMiddleware()
    {

    }

    protected function loadControllers()
    {

    }

    protected function loadMigrations()
    {

    }

    protected function loadViews()
    {

    }

    protected function registerRoutes()
    {

    }

}