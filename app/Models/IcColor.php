<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IcColor extends Model
{
    use HasFactory;

    public const YELLOW = 1;

    public const GREEN = 2;

    public $timestamps = false;

    protected $table = 'ic_color';
}
