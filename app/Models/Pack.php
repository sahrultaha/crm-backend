<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pack extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_id',
        'imsi_id',
        'product_id',
        'pack_type_id',
        'installation_date',
        'expiry_date',
    ];

    protected $table = 'pack';

    public function number(): BelongsTo
    {
        return $this->belongsTo(Number::class);
    }

    public function imsi(): BelongsTo
    {
        return $this->belongsTo(Imsi::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
