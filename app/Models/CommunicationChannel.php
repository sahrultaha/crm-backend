<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunicationChannel extends Model
{
    public const SMS = 1;

    public const EMAIL = 2;

    public const WHATSAPP = 3;

    protected $table = 'communication_channel';
}
