<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Number extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'number';

    protected $fillable = [
        'number',
        'number_type_id',
        'number_status_id',
        'number_category_id',
    ];

    public function pack(): HasOne
    {
        return $this->hasOne(Pack::class);
    }

    public function subscriptionNumber()
    {
        return $this->has(SubscriptionNumber::class, 'number_id');
    }
}
