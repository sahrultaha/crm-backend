<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    public const PREPAID = 1;

    protected $table = 'subscription_type';
}
