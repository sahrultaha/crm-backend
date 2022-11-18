<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mukim extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'mukim';

    protected $fillable = ['district_id'];

    protected $primaryKey = 'id';

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function village()
    {
        return $this->hasMany('App\Models\Village', 'mukim_id');
    }
}
