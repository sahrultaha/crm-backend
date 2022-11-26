<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imsi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'imsi';

    protected $fillable = [
        'imsi',
        'imsi_status_id',
        'imsi_type_id',
        'pin',
        'puk_1',
        'puk_2',
        'ki',
    ];

    public function subscriptionNumber()
    {
        return $this->belongsTo(SubscriptionNumber::class, 'imsi_id');
    }
}
