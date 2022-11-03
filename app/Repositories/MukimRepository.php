<?php

namespace App\Repositories;

use App\Models\Mukim;

class MukimRepository
{
    public function showMukim($mukim_id): Mukim
    {
        $mukim = Mukim::findorFail($mukim_id);

        return $mukim;
    }
}
