<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DistrictRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DistrictController extends Controller
{
    private DistrictRepository $repository;

    public function __construct(DistrictRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        // return $this->repository->getListOfVillages($request->query());
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
}
