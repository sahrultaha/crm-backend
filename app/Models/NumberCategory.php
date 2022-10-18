<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberCategory extends Model
{
    public const NORMAL = 1;

    public const GOLD = 2;

    protected $table = 'number_category';
}
