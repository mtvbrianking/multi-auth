<?php

namespace Bmatovu\MultiAuth\Console\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

trait InstallsInertiaReactStack
{
    /**
     * Install the InertiaReact Breeze stack.
     *
     * @return null|int
     */
    protected function installInertiaReactStack()
    {
        $fs = new Filesystem;
        $guard = $this->argument('guard');
        $pluralClass = Str::plural(Str::studly($guard));
        $singularSlug = Str::singular(Str::slug($guard));
        $singularClass = Str::singular(Str::studly($guard));

        if (!$this->option('dark')) {
            $finder = (new Finder)
                ->in(__DIR__ . "/../../../.stubs/react/resources/js")
                ->name('*.jsx')
                ->notName('Welcome.jsx');

            $this->removeDarkClasses($finder);
        }

        // Module...
        $fs->ensureDirectoryExists(app_path("Modules/{$pluralClass}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/inertia/src', app_path("Modules/{$pluralClass}"));

        // Views...
        $fs->ensureDirectoryExists(resource_path("js/{$pluralClass}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/react/resources/js', resource_path("js/{$pluralClass}"));
        $fs->copyDirectory(__DIR__ . '/../../../.stubs/react/resources/views', resource_path("views"));

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
