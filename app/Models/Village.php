<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'village';

    protected $fillable = ['mukim_id'];

    protected $primaryKey = 'id';

    public function mukim()
    {
        return $this->belongsTo('App\Models\Mukim', 'mukim_id');
    }

    public function postalcode()
    {
        return $this->has('App\Models\PostalCode', 'village_id');
    }
}
