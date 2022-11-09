<?php

namespace App\Repositories;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Address;
use App\Models\FileRelation;
use App\Models\FileRelationType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerRepository
{

    public function createNewCustomer(array $validated): Customer
    {
        $address = new Address();
        $address->village_id = $validated['village_id'];
        $address->district_id = $validated['district_id'];
        $address->mukim_id = $validated['mukim_id'];
        $address->postal_code_id = $validated['postal_code_id'];
        $address->house_number = $validated['house_number'];
        $address->simpang = $validated['simpang'];
        $address->street = $validated['street'];
        $address->building_name = $validated['building_name'];
        $address->block = $validated['block'];
        $address->floor = $validated['floor'];
        $address->unit = $validated['unit'];

        $address->save();

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
        $new_customer->address_id = $address->id;
        $new_customer->ic_color_id = $validated['ic_color_id'] ?? null;

        $new_customer->save();

        return $new_customer;
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
        $customer = Customer::find($id);

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

    public function checkCustomerByIc($query)
    {
        return Customer::where('ic_number', $query['ic_number'])->where('ic_type_id', $query['ic_type_id'])->get();
    }
}
