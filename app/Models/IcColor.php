<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IcColor extends Model
{
    public const YELLOW = 1;

    public const GREEN = 2;

    protected $table = 'ic_color';
}
