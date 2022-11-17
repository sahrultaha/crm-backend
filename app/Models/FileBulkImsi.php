<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileBulkImsi extends Model
{
    use HasFactory;

    protected $table = 'file_bulk_imsi';

    protected $fillable = [
        'imsi',
        'pin',
        'puk_1',
        'puk_2',
        'imsi_type_id',
        'row_status_id',
        'file_id',
        'imsi_id',
    ];
}
