<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\VillageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VillageController extends Controller
{
    private VillageRepository $repository;

    public function __construct(VillageRepository $repository)
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
        return $this->repository->getListOfVillages($request->query());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $village = $this->repository->showVillage($id);

        return response()->json($village->toArray());
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('search');
        $data = $this->repository->autocomplete($query);

        return response()->json($data);
    }

    public function district(Request $request): District
    {
        $query = $request->get('search');
        $data = $this->repository->district($query);

        return response()->json($data);
    }
}
