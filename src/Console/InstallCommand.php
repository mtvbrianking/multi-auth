<?php

namespace Bmatovu\MultiAuth\Console;

use Bmatovu\MultiAuth\Console\Traits\InstallsBladeStack;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    use InstallsBladeStack;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'multi-auth:install
                            {guard=admin : Name of the guard.}
                            {--stack= : The development stack that should be installed (blade,react,vue,api)}
                            {--dark : Indicate that dark mode support should be installed}
                            {--pest : Indicate that Pest should be installed}
                            {--ssr : Indicates if Inertia SSR support should be installed}
                            {--composer=global : Absolute path to the Composer binary which should be used to install packages}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the MultiAuth controllers and resources';

    /**
     * The available stacks.
     *
     * @var array<int, string>
     */
    protected $stacks = ['blade', 'react', 'vue', 'api'];

    /**
     * Execute the console command.
     */
    public function handle(): mixed
    {
        $stack = $this->option('stack');

        if (!$stack) {
            $stack = $this->choice('Choose your stack:', $this->stacks, 0);
        }

        $this->hydrateStubs(__DIR__ . '/../../stubs', $this->placeholders($this->argument('guard')));

        if ($stack === 'vue') {
            // $this->installInertiaVueStack();
            $this->success('Coming soon...');
        } elseif ($stack === 'react') {
            // $this->installInertiaReactStack();
            $this->success('Coming soon...');
        } elseif ($stack === 'api') {
            // $this->installApiStack();
            $this->success('Coming soon...');
        } elseif ($stack === 'blade') {
            $this->installBladeStack();
        } else {
            $this->error('Invalid stack. Supported stacks are [blade], [react], [vue], and [api].');
        }

        return 1;
    }

    protected function placeholders(string $guard): array
    {
        return [
            '{{pluralCamel}}' => Str::plural(Str::camel($guard)),
            '{{pluralSlug}}' => Str::plural(Str::slug($guard)),
            '{{pluralSnake}}' => Str::plural(Str::snake($guard)),
            '{{pluralClass}}' => Str::plural(Str::studly($guard)),
            '{{singularCamel}}' => Str::singular(Str::camel($guard)),
            '{{singularSlug}}' => Str::singular(Str::slug($guard)),
            '{{singularSnake}}' => Str::singular(Str::snake($guard)),
            '{{singularClass}}' => Str::singular(Str::studly($guard)),
        ];
    }

    protected function hydrateStubs(string $dirPath, array $placeholders): void
    {
        $fs = new Filesystem;

        $fs->deleteDirectory(dirname($dirPath) . '/.stubs');

        $rdi = new \RecursiveDirectoryIterator($dirPath, \FilesystemIterator::SKIP_DOTS);

        $rii = new \RecursiveIteratorIterator($rdi);

        foreach ($rii as $splFileInfo) {
            $newPath = dirname($dirPath) . '/.stubs' . str_replace($dirPath, '', $splFileInfo->getPath());

            $fs->ensureDirectoryExists($newPath);

            $fileName = $splFileInfo->getFilename();

            $newFilePath = $newPath . '/' . strtr($fileName, $placeholders);

            $fileContent = file_get_contents($splFileInfo->getPath() . '/' . $fileName);

            file_put_contents($newFilePath, strtr($fileContent, $placeholders));
        }
    }
}
