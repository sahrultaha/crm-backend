<?php

namespace App\Repositories;

use App\Models\District;

class DistrictRepository
{
    public function showDistrict($district_id): District
    {
        $district = District::findorFail($district_id);

        return $district;
    }
}
