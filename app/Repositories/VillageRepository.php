<?php

namespace App\Repositories;

use App\Http\Resources\VillageResource;
use App\Models\Village;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VillageRepository
{
    public function showVillage($village_id): Village
    {
        $village = Village::findorFail($village_id);

        return $village;
    }

    public function getListOfVillages($query): AnonymousResourceCollection
    {
        $builder = Village::query()->orderBy('id', 'asc');

        return VillageResource::collection(
            $builder->get()
        );
    }

    public function autocomplete($query)
    {
        $builder = Village::with('mukim', 'mukim.district')
            ->select('id', 'name', 'mukim_id')
            ->take(10);

        if (env('DB_CONNECTION') === 'pgsql') {
            $builder->where('name', 'iLIKE', '%'.$query.'%');
        // whereRaw('name @@ to_tsquery(?)',[$query['search']] );
        } else {
            $builder->where('name', 'like', "%{$query['search']}%");
        }

        return $builder->get();
    }
}
