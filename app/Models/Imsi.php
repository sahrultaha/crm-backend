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
        return $this->Has(SubscriptionNumber::class, 'imsi_id');
    }

    public function imsiType()
    {
        return $this->belongsTo(ImsiType::class, 'imsi_type_id');
    }

    public function imsiStatus()
    {
        return $this->belongsTo(ImsiStatus::class, 'imsi_status_id');
    }
}
