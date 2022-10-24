<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function createNewCustomer(array $validated): Customer
    {
        $new_customer = new Customer();
        $new_customer->name = $validated['name'];
        $new_customer->email = $validated['email'];
        $new_customer->mobile_number = $validated['mobile_number'];
        $new_customer->ic_number = $validated['ic_number'];
        $new_customer->ic_type_id = $validated['ic_type_id'];
        $new_customer->ic_expiry_date = $validated['ic_expiry_date'];
        $new_customer->customer_title_id = $validated['customer_title_id'];
        $new_customer->account_category_id = $validated['account_category_id'];
        $new_customer->birth_date = $validated['birth_date'];
        $new_customer->country_id = $validated['country_id'];
        $new_customer->ic_color_id = $validated['ic_color_id'];

        $new_customer->save();

        return $new_customer;
    }
}
