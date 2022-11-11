<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function mukim()
    {
        return $this->belongsTo(Mukim::class, 'mukim_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function postalCode()
    {
        return $this->belongsTo(PostalCode::class, 'postal_code_id');
    }
}
