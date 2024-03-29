<?php

namespace Bmatovu\MultiAuth\Test;

use Illuminate\Support\Str;

class InstallCommandTest extends TestCase
{
    public function testInstallWrongStack()
    {
        $this->artisan('multi-auth:install')
            ->expectsQuestion('What is your stack?', 'rust')
            ->expectsOutput('Invalid stack. Supported stacks are [blade], [react], [vue], and [api].')
            ->assertExitCode(1);
    }

    public function testInstallInertiaVueStack()
    {
        $guard = 'seller';

        $pluralClass = Str::plural(Str::studly($guard));
        $singularClass = Str::singular(Str::studly($guard));

        $this->artisan("multi-auth:install {$guard} --stack=vue")
            ->expectsOutput("{$singularClass} guard successfully setup.")
            ->expectsOutput("\nRegister `App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class` in `config/app.php`")
            ->assertExitCode(1);
    }

    public function testInstallInertiaReactStack()
    {
        $guard = 'customer';

        $pluralClass = Str::plural(Str::studly($guard));
        $singularClass = Str::singular(Str::studly($guard));

        $this->artisan("multi-auth:install {$guard} --stack=react")
            ->expectsOutput("{$singularClass} guard successfully setup.")
            ->expectsOutput("\nRegister `App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class` in `config/app.php`")
            ->assertExitCode(1);
    }

    public function testInstallApiStack()
    {
        $guard = 'agent';

        $pluralClass = Str::plural(Str::studly($guard));
        $singularClass = Str::singular(Str::studly($guard));

        $this->artisan("multi-auth:install {$guard} --stack=api")
            ->expectsOutput("{$singularClass} guard successfully setup.")
            ->expectsOutput("\nRegister `App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class` in `config/app.php`")
            ->assertExitCode(1);
    }

    public function testInstallBladeStack()
    {
        $guard = 'admin';

        $pluralClass = Str::plural(Str::studly($guard));
        $singularClass = Str::singular(Str::studly($guard));

        $this->artisan("multi-auth:install {$guard} --stack=blade")
            ->expectsOutput("{$singularClass} guard successfully setup.")
            ->expectsOutput("\nRegister `App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class` in `config/app.php`")
            ->assertExitCode(1);
    }
}
