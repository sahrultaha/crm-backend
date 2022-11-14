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

    public function district($query)
    {
        $builder = District::with('district')
            ->select('id', 'name', 'district_id')
            // ->where('name', 'iLIKE', '%'.$query.'%')
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
