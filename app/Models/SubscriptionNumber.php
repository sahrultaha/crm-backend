<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionNumber extends Model
{
    use HasFactory;

    protected $table = 'subscription_number';

    public $timestamps = false;

    protected $fillable = [
        'subscription_id',
        'number_id',
        'imsi_id',
        'activation_date',
    ];

    protected $primaryKey = 'id';

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function number()
    {
        return $this->belongsTo(Number::class, 'number_id');
    }

    public function imsi()
    {
        return $this->belongsTo(Imsi::class, 'imsi_id');
    }
}
