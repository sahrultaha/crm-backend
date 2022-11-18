<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionNumber extends Model
{
    use HasFactory; 
    
    protected $table = 'subscription_number';

    protected $fillable = [
        'subscription_id',
        'number_id',
        'imsi_id',
    ];

    public function number()
    {
        return $this->hasMany(Number::class);
    }

    public function imsi()
    {
        return $this->hasMany(Imsi::class);
    }
}
