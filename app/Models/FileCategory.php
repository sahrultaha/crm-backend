<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FileCategory extends Model
{
    use HasFactory;

    public const CUSTOMER_IC_FRONT = 1;

    public const CUSTOMER_IC_BACK = 2;

    public const BULK_IMSI = 3;

    public const BULK_STARTER_PACK = 4;

    public $timestamps = false;

    protected $table = 'file_category';

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }
}
