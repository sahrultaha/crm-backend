<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

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

    public function subscriptionNumber()
    {
        return $this->has(SubscriptionNumber::class, 'subscription_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class);
    }

    public function subscriptionStatus()
    {
        return $this->belongsTo(SubscriptionStatus::class);
    }
}
