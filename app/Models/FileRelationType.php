<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRelationType extends Model
{
    use HasFactory;

    public const CUSTOMER = 1;

    public const BULK_IMSI = 2;

    public const BULK_STARTER_PACK = 3;

    protected $table = 'file_relation_type';

    public function files()
    {
        return $this->belongsToMany(File::class);
    }
}
