<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
