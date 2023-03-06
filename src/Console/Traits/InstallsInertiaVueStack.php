<?php

namespace Bmatovu\MultiAuth\Console\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait InstallsInertiaVueStack
{
    /**
     * Install the InertiaVue Breeze stack.
     *
     * @return null|int
     */
    protected function installInertiaVueStack()
    {
        $fs = new Filesystem;
        $guard = $this->argument('guard');
        $pluralClass = Str::plural(Str::studly($guard));
        $singularSlug = Str::singular(Str::slug($guard));
        $singularClass = Str::singular(Str::studly($guard));

        // Module...
        $fs->ensureDirectoryExists(app_path("Modules/{$pluralClass}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/inertia/src', app_path("Modules/{$pluralClass}"));

        // Views...
        $fs->ensureDirectoryExists(resource_path("views/{$singularSlug}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/vue/resources/js', resource_path("js/{$pluralClass}"));

        $fs->ensureDirectoryExists(resource_path("views/{$singularSlug}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/vue/resources/views', resource_path("views/{$singularSlug}"));

        // Tests...
        $fs->ensureDirectoryExists(base_path("tests/Feature/{$pluralClass}"));
        if ($this->option('pest')) {
            $fs->copyDirectory(__DIR__ . '/../../../.stubs/inertia/pest-tests/Feature', base_path("tests/Feature/{$pluralClass}"));
        } else {
            $fs->copyDirectory(__DIR__ . '/../../../.stubs/inertia/tests/Feature', base_path("tests/Feature/{$pluralClass}"));
        }

        // Conclude...
        $this->info("{$singularClass} guard successfully setup.");

        $serviceProvider = "App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class";

        $this->info("\nRegister `{$serviceProvider}` in `config/app.php`");
    }
}
