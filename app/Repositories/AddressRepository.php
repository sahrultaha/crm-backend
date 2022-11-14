<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{
    public function showAddress($id): Address
    {
        $address = Address::findorFail($id);

        return $address;
    }
}
