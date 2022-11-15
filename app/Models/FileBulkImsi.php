<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileBulkImsi extends Model
{
    protected $table = 'file_bulk_imsi';

    protected $fillable = [
        'imsi',
        'imsi_status_id',
        'imsi_type_id',
        'pin',
        'puk_1',
        'puk_2',
        'row_status_id',
        'file_id',
        'imsi_id',
    ];
}
