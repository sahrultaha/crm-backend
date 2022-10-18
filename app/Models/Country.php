<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public const BRUNEI = 1;

    public const MALAYSIA = 2;

    protected $table = 'country';
}
