<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubscriptionStatusUpdateRequest;
use App\Http\Requests\Api\SubscriptionStoreRequest;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Repositories\BaseRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionController extends Controller
{
    private BaseRepository $subRepository;

    private BaseRepository $subNumberRepository;

    private SubscriptionRepository $repo;

    public function __construct()
    {
        $this->subRepository = new SubscriptionRepository(new Subscription());
        $this->subNumberRepository = new BaseRepository(new SubscriptionNumber());
        $this->repo = new SubscriptionRepository(new Subscription);
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->repo->getListOfSubscriptions($request->query());
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

    public function subscriptionStatus(): JsonResponse
    {
        $subs_status = $this->repo->getSubStatusList();

        return response()->json([
            'data' => $subs_status,
        ]);
    }

    public function customerSubscriptions($customer_id)
    {
        $numbers = $this->repo->selectNumbers($customer_id);

        return $numbers;
    }

    public function update(Subscription $subscription, SubscriptionStatusUpdateRequest $request)
    {
        $validated = $request->validated();
       
        $this->repo->update($subscription->id, $validated);

        return response()->json($this->repo->find($subscription->id));
    }
}
