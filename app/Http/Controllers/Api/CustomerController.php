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
            'id' => $customer->id
        ], 201);
    }

    public function show($id){
        $customer = $this->repository->showCustomer($id);
        // dd($customer->toArray());
        return response()->json([
            'name' => $customer->name,
            'email' => $customer->email,
            'mobile_number' => $customer->mobile_number,
            'ic_number' => $customer->ic_number,
            'ic_type_id' => $customer->ic_type_id,
            'ic_color_id' => $customer->ic_color_id,
            'ic_expiry_date' => $customer->ic_expiry_date,
            'country_id' => $customer->country_id,
            'customer_title_id' => $customer->customer_title_id,
            'account_category_id' => $customer->account_category_id,
            'birth_date' => $customer->birth_date,
        ]);

    }
}
