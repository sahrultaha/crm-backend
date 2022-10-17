<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImsiStatus extends Model
{
    public const AVAILABLE = 1;

    public const ACTIVE = 2;

    public const TERMINATED = 3;

    protected $table = 'imsi_status';
}
