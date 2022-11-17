<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Repositories\SubscriptionRepository; 
use App\Repositories\SubscriptionNumberRepository;
use Illuminate\Http\Request;

class SubscriptionNumberController extends Controller
{
    private SubscriptionNumberRepository $repository;

    public function __construct(SubscriptionNumberRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
    //get all subscriptions
        return $this->repository->getListOfSubscriptions($request->query());
    }

    public function customerSubscriptions($id)
    { 
        $subscription = $this->repository->showSubscription($id);
        // dd($subscription);
        return $subscription;

        //query subscription with customer id
        // $subscription = $this->repository->getSubscriptionId($request->query());
        // // dd($subscription);
        // $subscription_id = $subscription->id;
        // return $this->repository->getListOfSubscriptions($subscription_id);
    }
}
