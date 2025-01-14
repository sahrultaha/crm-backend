<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const BILLING = 1;

    protected $table = 'address_type';
}
