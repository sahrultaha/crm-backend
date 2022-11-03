<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Repositories\DistrictRepository;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    private DistrictRepository $repository;

    public function __construct(DistrictRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $village
     * @return \Illuminate\Http\Response
     */
    public function showDistrict($district_id)
    {
        $district = $this->repository->showDistrict($district_id);

        return response()->json($address->toArray());
    }

    public function district(Request $request)
    {
        $data = District::select('id', 'name')
                    ->where('id', 'iLIKE', '%'.$request->get('search').'%')
                    ->take(1)
                    ->get();

        return response()->json($data);
    }
}
