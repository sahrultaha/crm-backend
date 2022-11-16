<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
// use App\Repositories\SubscriptionRepository; ->does not exist yet
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private MukimRepository $repository;

    public function __construct(MukimRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->repository->getofListSubscriptions($request->query());
    }

    // public function showSubscription($id)
    // {
    //     // $mukim = $this->repository->showMukim($id);
    //     // return response()->json($mukim->toArray());
    // }
}
