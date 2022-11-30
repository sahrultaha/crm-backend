<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const PENDING = 1;

    public const ACTIVE = 2;

    public const EXPIRED = 3;

    public const SUSPEND = 4;

    public const TERMINATED = 5;

    protected $table = 'subscription_status';
}
