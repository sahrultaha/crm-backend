<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberType extends Model
{
    public const PREPAID = 1;

    public const POSTPAID_PORT_IN = 2;

    protected $table = 'number_type';
}
