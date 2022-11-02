<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerStoreRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->repository->getListOfCustomers($request->query());
    }

    public function store(CustomerStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $customer = $this->repository->createNewCustomer($validated);

        return response()->json([
            'id' => $customer->id,
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $customer = $this->repository->showCustomer($id);

        $file_ids = $this->repository->getFileIds($customer->id);

        $data_to_return = $customer->toArray();
        $data_to_return = array_merge($data_to_return, [
            'file_ids' => $file_ids->isNotEmpty() ? $file_ids->pluck('file_id')->toArray() : [],
        ]);

        return response()->json($data_to_return);
    }

    public function checkIc(Request $request): JsonResponse
    {
        $customer = $this->repository->checkCustomerByIc($request->query());

        return response()->json($customer->toArray());
    }
}
