<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $fillable = [
        'customer_id',
        'registration_date',
        'subscription_status_id',
        'subscription_type_id',
        'number_id',
        'imsi_id',
        'activation_date',
    ];
}
