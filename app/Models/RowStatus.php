<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RowStatus extends Model
{
    public const NEW = 1;

    public const SUCCESS = 2;

    public const FAIL = 3;

    protected $table = 'row_status';
}
