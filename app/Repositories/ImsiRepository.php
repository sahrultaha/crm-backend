<?php

namespace App\Repositories;

use App\Http\Resources\ImsiResource;
use App\Models\Imsi;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImsiRepository
{
    public function createNewImsi(array $validated): Imsi
    {
        $new_imsi = new Imsi($validated);

        $new_imsi->save();

        return $new_imsi;
    }

    public function updateImsi(Imsi $imsi, array $validated): bool
    {
        foreach ($validated as $key => $value) {
            if ($value === '' || $value === null) {
                continue;
            }
            $imsi->{$key} = $value;
        }

        if ($imsi->isClean()) {
            return false;
        }

        return $imsi->save();
    }

    public function getListOfImsi($query): AnonymousResourceCollection
    {
        $limit = $query['limit'] ?? 10;
        if (! is_numeric($limit) || intval($limit) === 0) {
            $limit = 10;
        }

        $sort = $query['sort'] ?? 'desc';
        if ($sort !== 'asc' && $sort !== 'desc') {
            $sort = 'desc';
        }

        $builder = Imsi::query()->orderBy('id', $sort);

        return ImsiResource::collection(
            $builder->paginate($limit)
        );
    }
}
