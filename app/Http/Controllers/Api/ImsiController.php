<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ImsiStoreRequest;
use App\Http\Requests\Api\ImsiUpdateRequest;
use App\Http\Resources\ImsiResource;
use App\Models\Imsi;
use App\Repositories\ImsiRepository;
use Illuminate\Http\JsonResponse;

class ImsiController extends Controller
{
    private ImsiRepository $repository;

    public function __construct(ImsiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(ImsiStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $imsi = $this->repository->createNewImsi($validated);

        return response()->json([
            'id' => $imsi->id,
        ], 201);
    }

    public function update(Imsi $imsi, ImsiUpdateRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $this->repository->updateImsi($imsi, $validated);

        return response()->json([
            'id' => $imsi->id,
        ]);
    }

    public function show(Imsi $imsi): ImsiResource
    {
        return new ImsiResource($imsi);
    }
}
