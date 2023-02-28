<?php

namespace Bmatovu\MultiAuth\Test;

use Illuminate\Support\Str;

class InstallCommandTest extends TestCase
{
    public function test_install_wrong_stack()
    {
        $this->artisan('multi-auth:install')
            ->expectsQuestion('What is your stack?', 'rust')
            ->expectsOutput('Invalid stack. Supported stacks are [blade], [react], [vue], and [api].')
            ->assertExitCode(1);
    }

    public function test_install_inertia_vue_stack()
    {
        $this->artisan('multi-auth:install --stack=vue')
            ->expectsOutput('Coming soon...')
            ->assertExitCode(1);
    }

    public function test_install_inertia_react_stack()
    {
        $this->artisan('multi-auth:install --stack=react')
            ->expectsOutput('Coming soon...')
            ->assertExitCode(1);
    }

    public function test_install_api_stack()
    {
        $this->artisan('multi-auth:install --stack=api')
            ->expectsOutput('Coming soon...')
            ->assertExitCode(1);
    }

    public function test_install_blade_stack()
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
