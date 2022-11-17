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
        $subscriptions = $this->repository->getSubscriptionId($id);
        return $subscriptions;
        
        // return response()->json($data);
    }
}
