<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTitle extends Model
{
    use HasFactory;

    public const MR = 1;

    public const MS = 2;

    public const MRS = 3;

    public const HAJI = 4;

    public const HAJAH = 5;

    public const DR = 6;

    public $timestamps = false;

    protected $table = 'customer_title';
}
