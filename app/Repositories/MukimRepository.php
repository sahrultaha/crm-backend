<?php

namespace App\Repositories;

use App\Http\Resources\MukimResource;
use App\Models\Mukim;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MukimRepository
{

    public function showMukim($mukim_id): Mukim
    {
        $mukim = Mukim::findorFail($mukim_id);

        return $mukim;
    }

}
