<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerStoreRequest;
use App\Models\Customer;
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

        $address = $this->repository->createNewAddress($validated);

        $customer = $this->repository->createNewCustomer($validated, $address);

        return response()->json([
            'id' => $customer->id,
            'address_id' => $address->id,
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
        return response()->json($this->repository->checkCustomerByIc($request->query())->toArray());
    }

    public function getCustomer(Request $request): JsonResponse
    {
        $customer = $this->repository->getCustomerDetails($request->query());

        $file_ids = $this->repository->getFileIds($customer->id);
        
        $address_details = $this->repository->getAddressDetails($customer->address_id);

        $customer_data = $customer->toArray();
        $data_to_return= array_merge($customer_data, ['address'=>$address_details->toArray()?? '']);
        $data_to_return = array_merge($data_to_return, [
            'file_ids' => $file_ids->isNotEmpty() ? $file_ids->pluck('file_id')->toArray() : [],
        ]);

        return response()->json($data_to_return);
    }


    public function destroy(Customer $customer): JsonResponse
    {
        $id = $customer->id;

        $customer->delete();

        return response()->json([
            'id' => $id,
        ]);
    }

    public function update(CustomerStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $id = $request['id'];

        $customer_update = $this->repository->updateCustomer($id,$validated);

        return response()->json([
            'id' => $customer_update->id,
        ], 201);
    }
}
