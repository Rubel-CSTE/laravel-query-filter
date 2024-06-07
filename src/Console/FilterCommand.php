<?php

namespace Sufian\QueryFilter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FilterCommand extends Command
{
    protected $signature = 'make:filter {name}';
    protected $description = 'Create a new filter class';

    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->getPath($name);
        $this->makeDirectory($path);
        $this->writeFile($path, $name);
        $this->info('Filter class created successfully.');
    }

    protected function getPath($name)
    {
        return base_path('app/Filters/' . $name . 'Filter.php');
    }

    protected function makeDirectory($path)
    {
        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true, true);
        }
    }

    protected function writeFile($path, $name)
    {
        $stub = $this->getStub();
        $content = str_replace('{{className}}', $name, $stub);
        File::put($path, $content);
    }

    protected function getStub()
    {
        return file_get_contents(__DIR__ . '/stubs/filter.stub');
    }
}
