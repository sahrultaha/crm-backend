<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubscriptionStoreRequest;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Repositories\BaseRepository;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    private BaseRepository $subRepository;

    private BaseRepository $subNumberRepository;

    public function __construct()
    {
        $this->subRepository = new BaseRepository(new Subscription());
        $this->subNumberRepository = new BaseRepository(new SubscriptionNumber());
    }

    public function store(SubscriptionStoreRequest $request): JsonResponse
    {
        $attributes = $request->safe()->except([
            'number_id',
            'imsi_id',
            'activation_date',
        ]);
        $subscription = $this->subRepository->create($attributes);

        $attributes = $request->safe()->only([
            'number_id',
            'imsi_id',
            'activation_date',
        ]);
        $attributes['subscription_id'] = $subscription->id;
        $this->subNumberRepository->create($attributes);

        return response()->json([
            'id' => $subscription->id,
        ], 201);
    }
}
