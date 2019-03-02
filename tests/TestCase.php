<?php

namespace Bmatovu\MultiAuth\Test;

use Bmatovu\MultiAuth\MultiAuthServiceProvider;
use Illuminate\Container\Container;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    private $stub_path = __DIR__ . '/../../stubs';

    private $guard = 'Retailers';

    /**
     * Setup test environment.
     */
    public function setUp()
    {
        parent::setUp();

        // $this->artisan('multi-auth:install', ['name' => 'admin', '--force' => true]);
    }

    /**
     * Add package service provider
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MultiAuthServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    private function getNamespace()
    {
        $namespace = Container::getInstance()->getNamespace();
        return rtrim($namespace, '\\');
    }

    private function parseName($name = null)
    {
        return $parsed = array(
            '{{namespace}}' => $this->getNamespace(),
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

    protected function prepareMigrations()
    {
        $data_map = $this->parseName($this->guard);

        $signature = date('Y_m_d_His');

        $migrations = array(
            [
                'stub' => $this->stub_path . '/migrations/provider.stub',
                'path' => database_path('migrations/' . $signature . '_create_' . $data_map['{{pluralSnake}}'] . '_table.php'),
            ],
            [
                'stub' => $this->stub_path . '/migrations/password_resets.stub',
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
    }

}
