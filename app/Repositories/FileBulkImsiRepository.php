<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class FileBulkImsiRepository extends BaseRepository
{
    protected $imsi;

    public function __construct()
    {
        parent::__construct(new \App\Models\FileBulkImsi());
        $this->imsi = new BaseRepository(new \App\Models\Imsi());
    }

    public function countNew(int $file_id): int
    {
        $this->model->newQuery()
            ->where('file_id', $file_id)
            ->where('row_status_id', \App\Models\RowStatus::NEW)
            ->count();
    }

    /**
     * return collection of
     *
     * @param  int  $file_id
     * @return \Generator
     */
    public function getUnprocessedRows(int $file_id)
    {
        $id = 0;
        for (; ;) {
            /* @var $rows Collection */
            $rows = $this->model->query()
                ->where('file_id', $file_id)
                ->where('id', '>', $id)
                ->take(10)
                ->orderBy('id')
                ->get();
            if ($rows->isEmpty()) {
                break;
            }

            $id = $rows->last()->id;
            Log::debug(__METHOD__."found {$rows->count()} row(s)");

            yield $rows;
        }
    }

    public function checkExistingsImsi(array $imsis): Collection
    {
        return $this->imsi->select(['imsi' => $imsis]);
    }
}
