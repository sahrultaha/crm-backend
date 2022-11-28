<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NumberStoreRequest;
use App\Models\Number;
use App\Repositories\NumberRepository;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NumberController extends Controller
{
    private BaseRepository $repo;
    private NumberRepository $numRepo;

    public function __construct()
    {
        $this->repo = new BaseRepository(new Number());
        $this->numRepo = new NumberRepository(new Number());
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->numRepo->getNumbers($request->query());
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
