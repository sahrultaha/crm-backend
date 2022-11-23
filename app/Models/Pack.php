<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pack extends Model
{
    use HasFactory;

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
