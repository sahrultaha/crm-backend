<?php

namespace App\Listeners;

use App\Enum\Error;
use App\Events\BulkStarterPackStored;
use App\Models\RowStatus;
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
            $exists_imsis = $this->repo->getExistingImsis($rows);
            $exists_numbers = $this->repo->getExistingNumber($rows);

            foreach ($rows as $row) {
                if (in_array($row->imsi, $exists_imsis)) {
                    $row->row_status_id = RowStatus::FAIL;
                    $row->error = Error::IMSI_EXISTS;
                    $this->repo->save();

                    continue;
                }
                if (in_array($row->number, $exists_numbers)) {
                    $row->row_status_id = RowStatus::FAIL;
                    $row->error = Error::NUMBER_EXISTS;
                    $this->repo->save();

                    continue;
                }

                // @TODO: provisioning checker should go here

                $imsi = $this->repo->createImsi($row);
                $number = $this->repo->createNumber($row);
                $row->imsi_id = $imsi->id;
                $row->number_id = $number->id;
                $row->row_status_id = RowStatus::SUCCESS;
                $this->repo->save($row);
            }
        }
    }

    public function shouldQueue()
    {
        return true;
    }
}
