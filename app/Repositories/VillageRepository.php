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

    public function getListOfVillages($query) : AnonymousResourceCollection
    {
        return VillageResource::collection(
            Village::query()
        );
    }

}
