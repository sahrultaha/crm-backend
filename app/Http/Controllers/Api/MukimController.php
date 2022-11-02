<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mukim;
use App\Repositories\MukimRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MukimController extends Controller
{
    private MukimRepository $repository;

    public function __construct(MukimRepository $repository)
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
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    // public function showMukim($mukim_id)
    // {

    //     $mukim = $this->repository->showMukim($mukim_id);

    //     return response()->json($mukim->toArray());
    // }

    public function mukim(Request $request)
    {
        $data = Mukim::with('district')
                    ->select('id', 'name', 'district_id')
                    ->where('id', 'iLIKE', '%'.$request->get('search').'%')
                    ->take(1)
                    ->get();

        return response()->json($data);
    }
}
