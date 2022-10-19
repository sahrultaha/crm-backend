<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductNetwork extends Model
{
    public const THREE_G = 1;

    public const FOUR_G = 2;

    public const FIVE_G = 3;

    protected $table = 'product_network';
}
