<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

class FileBulkImsiRepository extends BaseRepository
{
    use TraitSelectUnprocessedRows;

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
     * @param  int  $file_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function selectByFileIdGroupByRowStatusID(int $file_id)
    {
        return $this->model->newQuery()
            ->selectRaw('row_status_id, count(row_status_id) as count_by_row_status_id')
            ->where('file_id', $file_id)
            ->groupBy('row_status_id')
            ->get();
    }

    public function checkExistingsImsi(array $imsis): Collection
    {
        return $this->imsi->select(['imsi' => $imsis]);
    }
}
