<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ImsiStoreRequest;
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
}
