<?php

namespace App\Repositories;

use App\Http\Resources\CustomerResource;
use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\FileRelation;
use App\Models\FileRelationType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerRepository
{
    public function createNewAddress(array $validated): Address
    {
        $address = new Address();
        $address->village_id = $validated['village_id'] ?? null;
        $address->district_id = $validated['district_id'] ?? null;
        $address->mukim_id = $validated['mukim_id'] ?? null;
        $address->postal_code_id = $validated['postal_code_id'] ?? null;
        $address->house_number = $validated['house_number'] ?? null;
        $address->simpang = $validated['simpang'] ?? null;
        $address->street = $validated['street'] ?? null;
        $address->building_name = $validated['building_name'] ?? null;
        $address->block = $validated['block'] ?? null;
        $address->floor = $validated['floor'] ?? null;
        $address->unit = $validated['unit'] ?? null;

        $address->save();

        return $address;
    }

    public function createNewCustomer(array $validated, Address $address): Customer
    {
        $new_customer = new Customer();
        $new_customer->name = $validated['name'];
        $new_customer->email = $validated['email'] ?? null;
        $new_customer->country_code = $validated['country_code'] ?? null;
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

    public function createCustomerAddress(array $validated, Customer $customer, Address $address): CustomerAddress
    {
        $customer_address = new CustomerAddress();
        $customer_address->customer_id = $customer->id ?? null;
        $customer_address->address_id = $address->id ?? null;
        $customer_address->address_type_id = $validated['address_type_id'];

        $customer_address->save();

        return $customer_address;
    }

    public function getListOfCustomers($query): AnonymousResourceCollection
    {
        $limit = $query['limit'] ?? 10;
        if (! is_numeric($limit) || intval($limit) === 0) {
            $limit = 10;
        }

        $sort = $query['sort'] ?? 'desc';
        if ($sort !== 'asc' && $sort !== 'desc') {
            $sort = 'desc';
        }
        $builder = Customer::query()->orderBy('id', $sort);
        $builder->with('accountCategory');
        if (isset($query['search']) && mb_strlen($query['search']) > 3) {
            if (env('DB_CONNECTION') === 'pgsql') {
                $builder->whereRaw('fulltext @@ to_tsquery(?)', [$query['search']]);
            } else {
                $builder->where('fulltext', 'like', "%{$query['search']}%");
            }
        }
        if (isset($query['name'])) {
            $builder->where('name', 'ilike', $query['name']);
        }
        if (isset($query['email'])) {
            $builder->where('email', $query['email']);
        }
        if (isset($query['ic'])) {
            $builder->where('ic_number', $query['ic']);
        }

        return CustomerResource::collection(
            $builder->paginate($limit)
        );
    }

    public function showCustomer($id): Customer
    {
        $customer = Customer::with(['accountCategory', 'ic_type', 'ic_color', 'country'])
        ->find($id);

        return $customer;
    }

    public function getFileIds($id): Collection
    {
        return FileRelation::query()
            ->select('file_id')
            ->where('file_relation_type_id', FileRelationType::CUSTOMER)
            ->where('relation_id', $id)
            ->get();
    }

    public function getCustomerDetails($query): Customer
    {
        return Customer::find($query['id']);
    }

    public function updateAddress($address_id, array $validated): Address
    {
        $address = Address::find($address_id);

        if (array_key_exists('village_id', $validated)) {
            $address->village_id = $validated['village_id'];
        }
        if (array_key_exists('district_id', $validated)) {
            $address->district_id = $validated['district_id'];
        }
        if (array_key_exists('mukim_id', $validated)) {
            $address->mukim_id = $validated['mukim_id'];
        }
        if (array_key_exists('postal_code_id', $validated)) {
            $address->postal_code_id = $validated['postal_code_id'];
        }
        if (array_key_exists('house_number', $validated)) {
            $address->house_number = $validated['house_number'];
        }
        if (array_key_exists('simpang', $validated)) {
            $address->simpang = $validated['simpang'];
        }
        if (array_key_exists('street', $validated)) {
            $address->street = $validated['street'];
        }
        if (array_key_exists('building_name', $validated)) {
            $address->building_name = $validated['building_name'];
        }
        if (array_key_exists('block', $validated)) {
            $address->block = $validated['block'];
        }
        if (array_key_exists('floor', $validated)) {
            $address->floor = $validated['floor'];
        }
        if (array_key_exists('unit', $validated)) {
            $address->unit = $validated['unit'];
        }

        $address->save();

        return $address;
    }

    public function updateCustomer($id, array $validated): Customer
    {
        $customer = Customer::find($id);
        $customer->name = $validated['name'];
        $customer->email = $validated['email'] ?? null;
        $customer->mobile_number = $validated['mobile_number'] ?? null;
        $customer->country_code = $validated['country_code'] ?? null;
        $customer->ic_number = $validated['ic_number'];
        $customer->ic_type_id = $validated['ic_type_id'];
        $customer->ic_expiry_date = $validated['ic_expiry_date'];
        $customer->customer_title_id = $validated['customer_title_id'] ?? null;
        $customer->account_category_id = $validated['account_category_id'];
        $customer->birth_date = $validated['birth_date'];
        $customer->country_id = $validated['country_id'];
        $customer->ic_color_id = $validated['ic_color_id'] ?? null;

        $customer->save();

        return $customer;
    }

    public function getCustomerAddress($id, $address_type_id)
    {
        $customer_address = CustomerAddress::with(['address', 'address.district', 'address.village', 'address.mukim', 'address.postalcode'])
        ->where('customer_id', $id)
        ->where('address_type_id', $address_type_id)
        ->get();

        return $customer_address;
    }

    public function checkCustomerByIc($query)
    {
        return Customer::where('ic_number', $query['ic_number'])->where('ic_type_id', $query['ic_type_id'])->get();
    }
}
