<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BulkFileInsertionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Listeners\BulkFileImsiInsertion::class, function ($app) {
            return new \App\Listeners\BulkFileImsiInsertion(
                new \App\Repositories\FileBulkImsiRepository(),
                new \App\Repositories\BaseRepository(new \App\Models\Imsi())
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
