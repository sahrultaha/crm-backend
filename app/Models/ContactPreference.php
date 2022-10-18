<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPreference extends Model
{
    public const SMS = 1;

    public const EMAIL = 2;

    protected $table = 'contact_preference';
}
