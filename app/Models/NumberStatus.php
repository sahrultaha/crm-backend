<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberStatus extends Model
{
    use HasFactory;

    public const AVAILABLE = 1;

    public const ACTIVE = 2;

    public const TERMINATED = 3;

    public $timestamps = false;

    protected $table = 'number_status';
}
