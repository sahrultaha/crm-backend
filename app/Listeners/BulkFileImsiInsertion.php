<?php

namespace App\Listeners;

use App\Events\BulkFileImsiStored;
use App\Repositories\BaseRepository;
use App\Repositories\FileBulkImsiRepository;
use Illuminate\Contracts\Queue\ShouldQueue;

class BulkFileImsiInsertion implements ShouldQueue
{
    protected $bulkRepo;

    protected $imsiRepo;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(FileBulkImsiRepository $fileRepo, BaseRepository $imsiRepo)
    {
        $this->bulkRepo = $fileRepo;
        $this->imsiRepo = $imsiRepo;
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
        foreach ($this->bulkRepo->getUnprocessedRows($file->id) as $rows) {
            $imsis = $rows->pluck('imsi');
            $exists = $this->bulkRepo->checkExistingsImsi($imsis->all());
            $exists_imsis = $exists->pluck('imsi');
            foreach ($rows as $row) {
                if (! in_array($row->imsi, $exists_imsis->all())) {
                    $row->row_status_id = \App\Models\RowStatus::SUCCESS;
                    $this->bulkRepo->save($row);
                    $this->imsiRepo->create(['imsi_status_id' => \App\Models\ImsiStatus::AVAILABLE, ...$row->toArray()]);

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
