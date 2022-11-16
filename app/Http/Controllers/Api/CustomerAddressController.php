<?php

namespace App\Http\Controllers;

class CustomerAddressController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function showCustomerAddress($id)
    {
        $customer_address = $this->repository->showCustomerAddress($id); //create repository 14/11/2022:10:41

        return response()->json($customer_address->toArray());
    }
}
