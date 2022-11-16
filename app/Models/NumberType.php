<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberType extends Model
{
    use HasFactory;

    public const PREPAID = 1;

    public const POSTPAID_PORT_IN = 2;

    public $timestamps = false;

    protected $table = 'number_type';
}
