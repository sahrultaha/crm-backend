<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImsiStatus extends Model
{
    use HasFactory;

    public const AVAILABLE = 1;

    public const ACTIVE = 2;

    public const TERMINATED = 3;

    protected $table = 'imsi_status';
}
