<?php

namespace App\Repositories;

use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DistrictRepository
{

    public function showDistrict($district_id): District
    {
        $district = District::findorFail($district_id);

        return $district;
    }

}
