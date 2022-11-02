<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    protected $table = 'district';

    // public function mukim()
    // {
    //     return $this->belongsTo(Mukim::class);
    // }
}
