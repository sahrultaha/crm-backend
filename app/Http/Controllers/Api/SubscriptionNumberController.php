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
        $subscription_ids = [];
        $subscriptions = $this->repository->getSubscriptionId($id);
        $ids = $subscriptions->all();
        foreach ($ids as $id){
            array_push($subscription_ids, $id->id);
        }
        
        $customer_subscriptions=[];
        foreach ($subscription_ids as $subscription_id){
            dd(getCustomerSubscription(1)) ;
            // $customer_sub = getCustomerSubscription($subscription_id);
            // array_push($customer_subscriptions, $customer_sub);
        }

        
    }
}
