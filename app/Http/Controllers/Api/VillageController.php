<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\VillageRepository;
use App\Models\Village;
use Illuminate\Http\JsonResponse;
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
    public function index(Request $request) : AnonymousResourceCollection
    { return view('village');
        // return $this->repository->getListOfVillages($request->query());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $address = $this->repository->showVillage($id);

        return response()->json($address->toArray());
    }

    public function autocomplete(Request $request)
    {
        $data = Village::with('mukim', 'mukim.district')
                    ->select("id", "name", "mukim_id")
                    ->where('name', 'iLIKE', '%'. $request->get('search'). '%')
                    ->take(10)
                    ->get();
                    
    
        return response()->json($data);
    }
}
