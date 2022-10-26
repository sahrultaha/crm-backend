<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public const BRUNEI = 1;

    public const MALAYSIA = 2;

    public $timestamps = false;

    protected $table = 'country';
}
