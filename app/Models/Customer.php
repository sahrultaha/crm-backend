<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer';

    protected $hidden = [
        'fulltext',
        'deleted_at',
    ];

    public function accountCategory()
    {
        return $this->belongsTo(AccountCategory::class, 'account_category_id');
    }

    public function customerAddress()
    {
        return $this->belongsToMany(CustomerAddress::class, 'customer_address');
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
}
