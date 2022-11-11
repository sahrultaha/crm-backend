<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imsi extends Model
{
    protected $table = 'imsi';

    protected $fillable = [
        'imsi',
        'imsi_status_id',
        'imsi_type_id',
        'pin',
        'puk_1',
        'puk_2'
    ];
}
