<?php

namespace App\Repositories;

class FileBulkStarterPackRepository extends BaseRepository
{
    use TraitSelectUnprocessedRows;

    protected $imsi_types = [];

    public function __construct()
    {
        parent::__construct(new \App\Models\FileBulkStarterPack());
    }

    public function getImsiTypeID(string $name)
    {
        if (empty($this->imsi_types)) {
            $this->imsi_types = \App\Models\ImsiType::all()->keyBy('name');
        }
        if (isset($this->imsi_types[$name])) {
            return $this->imsi_types[$name]->id;
        }
    }
}
