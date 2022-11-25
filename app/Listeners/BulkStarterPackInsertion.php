<?php

namespace App\Listeners;

use App\Events\BulkFileImsiStored;
use Illuminate\Contracts\Queue\ShouldQueue;

class BulkStarterPackInsertion implements ShouldQueue
{
    protected $repo;

    public function __construct(\App\Repositories\FileBulkStarterPackRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BulkFileImsiStored  $event
     * @return void
     */
    public function handle(BulkFileImsiStored $event)
    {
        $file = $event->getFile();
        /* @var $rows \Illuminate\Database\Eloquent\Collection */
    }

    public function shouldQueue()
    {
        return true;
    }
}
