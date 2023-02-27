<?php

namespace Bmatovu\MultiAuth\Console\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

trait InstallsBladeStack
{
    /**
     * Install the Blade Breeze stack.
     *
     * @return int|null
     */
    protected function installBladeStack()
    {
        $guard = $this->argument('guard');
        $pluralClass = Str::plural(Str::studly($guard));
        $singularSlug = Str::singular(Str::slug($guard));
        $singularClass = Str::singular(Str::studly($guard));

        // Module...
        (new Filesystem)->ensureDirectoryExists(app_path("Modules/{$pluralClass}"));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../../.stubs/blade/src', app_path("Modules/{$pluralClass}"));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path("views/{$singularSlug}"));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../../.stubs/blade/resources/views', resource_path("views/{$singularSlug}"));

        // Tests...
        (new Filesystem)->ensureDirectoryExists(base_path("tests/Feature/{$singularClass}"));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../../.stubs/blade/tests/Feature', base_path("tests/Feature/{$singularClass}"));

        // Conclude...
        $this->info("{$singularClass} guard successfully setup.");

        $serviceProvider = "App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class";

        $this->info("\nRegister `$serviceProvider` in `config/app.php`");
    }
}
