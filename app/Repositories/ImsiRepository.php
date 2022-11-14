<?php

namespace App\Repositories;

use App\Models\Imsi;

class ImsiRepository
{
    public function createNewImsi(array $validated): Imsi
    {
        $new_imsi = new Imsi($validated);

        $new_imsi->save();

        return $new_imsi;
    }
}
