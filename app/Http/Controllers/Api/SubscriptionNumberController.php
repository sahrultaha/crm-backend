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
        return $this->repository->getListOfSubscriptions($request->query());
    }

    public function customerSubscriptions($id)
    { 
        $subscription_ids = [];
        $subscriptions = $this->repository->getSubscriptionId($id);
        $ids = $subscriptions->all();
        foreach ($ids as $id){
            array_push($subscription_ids, $id->id);
        }
        $customer_sub = $this->repository->getCustomerSubscription($subscription_ids);

        return $customer_sub;
    }
}
