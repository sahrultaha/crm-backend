<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Repositories\SubscriptionRepository; 
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private SubscriptionRepository $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->getListOfSubscriptions($request->query());
    }

}
