<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PackStoreRequest;
use App\Models\Imsi;
use App\Models\Number;
use App\Models\Pack;
use App\Repositories\PackRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PackController extends Controller
{
    private PackRepository $repository;

    public function __construct()
    {
        $this->repository = new PackRepository(new Pack());
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->repository->getList($request->query());
    }

    public function show(Pack $pack): JsonResponse
    {
        return response()->json($pack->toArray());
    }

    public function store(PackStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $number = new Number();
        $number->number = $validated['number'];
        $number->number_type_id = 1; // Prepaid
        $number->number_status_id = 1; // Available
        $number->number_category_id = 1; // Normal
        $number->save();

        $imsi = new Imsi();
        $imsi->imsi = $validated['imsi'];
        $imsi->imsi_status_id = 1; // Available
        $imsi->imsi_type_id = 2; // 4G
        $imsi->pin = $validated['pin'];
        $imsi->puk_1 = $validated['puk_1'];
        $imsi->puk_2 = $validated['puk_2'];
        $imsi->save();

        $pack = new Pack();
        $pack->number_id = $number->id;
        $pack->imsi_id = $imsi->id;
        $pack->product_id = $validated['product_id'];
        $pack->pack_type_id = 1; // Pack Type A
        $pack->installation_date = $validated['installation_date'];
        $pack->expiry_date = $validated['expiry_date'];
        $pack->save();

        return response()->json([
            'id' => $pack->id,
        ]);
    }
}
