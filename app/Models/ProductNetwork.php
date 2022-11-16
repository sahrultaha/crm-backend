<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNetwork extends Model
{
    use HasFactory;

    public const THREE_G = 1;

    public const FOUR_G = 2;

    public const FIVE_G = 3;

    public $timestamps = false;

    protected $table = 'product_network';
}
