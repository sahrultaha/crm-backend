<?php

namespace App\Providers;

use App\Listeners\ProcessBulkFileImsi;
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
        $this->app->singleton(ProcessBulkFileImsi::class, function ($app) {
            return new ProcessBulkFileImsi(
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
