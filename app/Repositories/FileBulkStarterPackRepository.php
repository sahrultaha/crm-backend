<?php

namespace App\Repositories;

use App\Models\FileBulkStarterPack;
use App\Models\Imsi;

class FileBulkStarterPackRepository extends BaseRepository
{
    use TraitSelectUnprocessedRows;

    protected $imsi_types = [];

    public function __construct()
    {
        parent::__construct(new FileBulkStarterPack());
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

    public function createImsi(FileBulkStarterPack $row): Imsi | null
    {
        \Illuminate\Support\Facades\Log::debug(__METHOD__);
        $exists = Imsi::query()
            ->where('imsi', $row->imsi)
            ->first();
        if ($exists) {
            return null;
        }

        return Imsi::create([
            'imsi' => $row->imsi,
            'imsi_status_id' => \App\Models\ImsiStatus::AVAILABLE,
            'imsi_type_id' => $row->imsi_type_id,
            'pin' => $row->pin,
            'puk_1' => $row->puk_1,
            'puk_2' => $row->puk_2,
            'ki' => $row->ki,
        ]);
    }

    public function selectImsisByImsi(array $imsis): \Illuminate\Database\Eloquent\Collection
    {
        return Imsi::query()
            ->whereIn('imsi', $imsis)
            ->get();
    }
}
