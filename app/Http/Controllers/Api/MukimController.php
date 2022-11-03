<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mukim;
use App\Repositories\MukimRepository;
use Illuminate\Http\Request;

class MukimController extends Controller
{
    private MukimRepository $repository;

    public function __construct(MukimRepository $repository)
    {
        $this->repository = $repository;
    }

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
