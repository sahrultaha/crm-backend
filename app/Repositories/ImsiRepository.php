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

    public function updateImsi(Imsi $imsi, array $validated): bool
    {
        foreach ($validated as $key => $value) {
            if ($value === '' || $value === null) {
                continue;
            }
            $imsi->{$key} = $value;
        }

        if ($imsi->isClean()) {
            return false;
        }

        return $imsi->save();
    }
}
