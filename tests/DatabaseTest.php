<?php

namespace Bmatovu\MultiAuth\Test;

use Illuminate\Contracts\Http\Kernel;

class DatabaseTest extends TestCase
{

    /**
     * Define hooks to migrate the database before and after each test.
     *
     * From Illuminate\Foundation\Testing -> runDatabaseMigrations
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->artisan('migrate');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

    /**
     * @test
     */
    public function can_read_stubs()
    {
        $stub_path = __DIR__ . '/../stubs/migration.stub';

        if (is_readable($stub_path) === false) {
            fwrite(STDERR, print('Can\'t read file'));
        }
    }

}