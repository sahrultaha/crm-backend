<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Village;
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
        return view('village');
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
        $data = Village::with('mukim', 'mukim.district')
                    ->select('id', 'name', 'mukim_id')
                    ->where('name', 'iLIKE', '%'.$request->get('search').'%')
                    ->take(10)
                    ->get();

        return response()->json($data);
    }
}
