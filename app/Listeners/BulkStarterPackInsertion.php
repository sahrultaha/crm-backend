<?php

namespace App\Listeners;

use App\Events\BulkStarterPackStored;
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
    public function handle(BulkStarterPackStored $event)
    {
        \Illuminate\Support\Facades\Log::debug(__METHOD__);
        $file = $event->getFile();
        foreach ($this->repo->selectUnprocessedRows($file->id) as $rows) {
            $imsis = $rows->pluck('imsi');
            $exists = $this->repo->selectImsisByImsi($imsis->all());
            $exists_imsis = $exists->pluck('imsi');
            foreach ($rows as $row) {
                if (! in_array($row->imsi, $exists_imsis->all())) {
                    $row->row_status_id = \App\Models\RowStatus::SUCCESS;
                    // provisioning checker should go here
                    $this->repo->createImsi($row);
                    $this->repo->save($row);

                    continue;
                }
                $row->row_status_id = \App\Models\RowStatus::FAIL;
                $this->bulkRepo->save($row);
            }
        }
    }

    public function shouldQueue()
    {
        return true;
    }
}
