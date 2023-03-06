<?php

namespace Bmatovu\MultiAuth\Console\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait InstallsApiStack
{
    /**
     * Install the API Breeze stack.
     *
     * @return null|int
     */
    protected function installApiStack()
    {
        $fs = new Filesystem;
        $guard = $this->argument('guard');
        $pluralClass = Str::plural(Str::studly($guard));
        $singularClass = Str::singular(Str::studly($guard));

        // Module...
        $fs->ensureDirectoryExists(app_path("Modules/{$pluralClass}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/api/src', app_path("Modules/{$pluralClass}"));

        // Tests...
        $fs->ensureDirectoryExists(base_path("tests/Feature/{$pluralClass}"));
        if ($this->option('pest')) {
            $fs->copyDirectory(__DIR__ . '/../../../.stubs/api/pest-tests/Feature', base_path("tests/Feature/{$pluralClass}"));
        } else {
            $fs->copyDirectory(__DIR__ . '/../../../.stubs/api/tests/Feature', base_path("tests/Feature/{$pluralClass}"));
        }

        // Conclude...
        $this->info("{$singularClass} guard successfully setup.");

        $serviceProvider = "App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class";

        $this->info("\nRegister `{$serviceProvider}` in `config/app.php`");
    }
}
