<?php

//new \App\Listeners\Handlers\BulkFileImsiHandler(new \App\Repositories\BaseRepository(new \App\Models\FileBulkImsi())),

namespace App\Providers;

use App\Listeners\Handlers\BulkFileImsiHandler;
use Illuminate\Support\ServiceProvider;

class BulkFileImsiHandlerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BulkFileImsiHandler::class, function ($app) {
            return new BulkFileImsiHandler(new \App\Repositories\BaseRepository(new \App\Models\FileBulkImsi()));
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
