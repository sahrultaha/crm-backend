<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionNumber extends Model
{
    protected $table = 'subscription_number';

    protected $fillable = [
        'subscription_id',
        'number_id',
        'imsi_id',
        'activation_date',
    ];
}
