<?php

namespace App\Repositories;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerRepository
{
    public function createNewCustomer(array $validated): Customer
    {
        $new_customer = new Customer();
        $new_customer->name = $validated['name'];
        $new_customer->email = $validated['email'] ?? null;
        $new_customer->mobile_number = $validated['mobile_number'] ?? null;
        $new_customer->ic_number = $validated['ic_number'];
        $new_customer->ic_type_id = $validated['ic_type_id'];
        $new_customer->ic_expiry_date = $validated['ic_expiry_date'];
        $new_customer->customer_title_id = $validated['customer_title_id'] ?? null;
        $new_customer->account_category_id = $validated['account_category_id'];
        $new_customer->birth_date = $validated['birth_date'];
        $new_customer->country_id = $validated['country_id'];
        $new_customer->ic_color_id = $validated['ic_color_id'] ?? null;

        $new_customer->save();

        return $new_customer;
    }

    public function getListOfCustomers($query): AnonymousResourceCollection
    {
        $limit = 10;
        if (array_key_exists('limit', $query) && is_numeric($query['limit'])) {
            $limit = intval($query['limit']);
        }

        $sort = 'desc';
        if (array_key_exists('sort', $query) && $query['sort'] === 'asc') {
            $sort = 'asc';
        }

        return CustomerResource::collection(
            Customer::query()
                ->orderBy('id', $sort)
                ->paginate($limit)
        );
    }

    public function showCustomer($id): Customer
    {
        $customer = Customer::find($id);

        return $customer;
    }
}
