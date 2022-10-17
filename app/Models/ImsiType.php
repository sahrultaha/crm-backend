<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImsiType extends Model
{
    public const THREE_G = 1;

    public const FOUR_G = 2;

    protected $table = 'imsi_type';
}
