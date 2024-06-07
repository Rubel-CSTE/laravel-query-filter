<?php

namespace Sufian\QueryFilter;

use Illuminate\Support\ServiceProvider;

class QueryFilterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            Console\FilterCommand::class,
        ]);
    }

    public function boot()
    {
        // Publish config or other resources if needed
    }
}
