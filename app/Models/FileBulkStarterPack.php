<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileBulkStarterPack extends Model
{
    protected $table = 'file_bulk_starter_pack';

    protected $fillable = [
        'imsi',
        'imsi_type_id',
        'pin',
        'puk_1',
        'puk_2',
        'row_status_id',
        'file_id',
        'imsi_id',
        'number',
        'number_id',
        'product',
        'product_id',
    ];
}
