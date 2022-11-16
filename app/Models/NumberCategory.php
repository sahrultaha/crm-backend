<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberCategory extends Model
{
    use HasFactory;

    public const NORMAL = 1;

    public const GOLD = 2;

    public $timestamps = false;

    protected $table = 'number_category';
}
