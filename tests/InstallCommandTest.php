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
            ->assertExitCode(1)
        ;
    }

    public function testInstallInertiaVueStack()
    {
        $this->artisan('multi-auth:install --stack=vue')
            ->expectsOutput('Coming soon...')
            ->assertExitCode(1)
        ;
    }

    public function testInstallInertiaReactStack()
    {
        $this->artisan('multi-auth:install --stack=react')
            ->expectsOutput('Coming soon...')
            ->assertExitCode(1)
        ;
    }

    public function testInstallApiStack()
    {
        $this->artisan('multi-auth:install --stack=api')
            ->expectsOutput('Coming soon...')
            ->assertExitCode(1)
        ;
    }

    public function testInstallBladeStack()
    {
        $guard = 'admin';

        $pluralClass = Str::plural(Str::studly($guard));
        $singularClass = Str::singular(Str::studly($guard));

        $this->artisan("multi-auth:install {$guard} --stack=blade")
            ->expectsOutput("{$singularClass} guard successfully setup.")
            ->expectsOutput("\nRegister `App\\Modules\\{$pluralClass}\\{$singularClass}ServiceProvider::class` in `config/app.php`")
            ->assertExitCode(1)
        ;
    }
}
