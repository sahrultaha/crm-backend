<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{
    public const BILLING = 1;

    protected $table = 'address_type';
}
