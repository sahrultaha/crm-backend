<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubscriptionStoreRequest;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Http\Resources\NumberResource;
use App\Repositories\BaseRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionController extends Controller
{
    private BaseRepository $subRepository;

    private BaseRepository $subNumberRepository;

    public function __construct()
    {
        $this->subRepository = new SubscriptionRepository(new Subscription());
        $this->subNumberRepository = new BaseRepository(new SubscriptionNumber());
    }

    public function index(Request $request)
    {
        return $this->subRepository->getListOfSubscriptions($request->query());
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

    public function customerSubscriptions($customer_id)
    {
        $numberss = $this->subRepository->getCustomerSubscriptions($customer_id);
        $arr=[];
        foreach ($numberss as $numbers)
        {  
            foreach ($numbers as $number)
            {  
                array_push($arr, $number->number->number);
            }
        }
        return $arr;
    }
}
