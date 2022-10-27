<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerStoreRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(CustomerStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $customer = $this->repository->createNewCustomer($validated);

        return response()->json([
            'id' => $customer->id,
        ], 201);
    }
}
