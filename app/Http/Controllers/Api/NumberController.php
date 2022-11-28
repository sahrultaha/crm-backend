<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NumberStoreRequest;
use App\Repositories\NumberRepository;
use App\Repositories\BaseRepository;
use App\Models\Number;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NumberController extends Controller
{
    private BaseRepository $repo;
    
    public function __construct()
    {
        $this->repo = new BaseRepository(new Number());
    }

    public function store(NumberStoreRequest $request): JsonResponse
    {
        $attributes = $request->validated();
        $number = $this->repo->create($attributes);

        return response()->json([
            'id' => $number->id,
        ], 201);
    }
}
