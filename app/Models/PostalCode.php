<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'postal_code';

    public function village()
    {
        return $this->belongsTo('App\Models\Village', 'village_id');
    }
}
