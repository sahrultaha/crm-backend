<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription';

    protected $fillable = ['customer_id'];

    protected $primaryKey = 'id';

    public function subscriptionNumber()
    {
        return $this->belongsTo(SubscriptionNumber::class, 'subscription_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'subscription_id');
    }

}
