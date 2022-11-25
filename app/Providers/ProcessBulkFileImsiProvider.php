<?php

namespace App\Providers;

use App\Listeners\ProcessBulkFile;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\ServiceProvider;

class ProcessBulkFileImsiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProcessBulkFile::class, function ($app) {
            return new ProcessBulkFile(
                $app->get(Factory::class),
                new \App\Listeners\Handlers\BulkHandlerFactory(),
                new \App\Events\Dispatcher(),
                $app->get(\Illuminate\Log\Logger::class)
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
