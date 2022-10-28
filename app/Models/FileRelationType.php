<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRelationType extends Model
{
    use HasFactory;

    public const CUSTOMER = 1;

    protected $table = 'file_relation_type';

    public function files()
    {
        return $this->belongsToMany(File::class);
    }
}
