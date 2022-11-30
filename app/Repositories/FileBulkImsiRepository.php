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

    public function checkExistingsImsi(array $imsis): Collection
    {
        return $this->imsi->select(['imsi' => $imsis]);
    }
}
