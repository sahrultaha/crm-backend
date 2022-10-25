<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    use HasFactory;

    public const BRUNEI_PERSONAL = 1;

    public const FOREIGN_PERSONAL = 2;

    public const COMPANY = 3;

    public const EMBASSY = 4;

    public const GOVERNMENT = 5;

    public $timestamps = false;

    protected $table = 'account_category';
}
