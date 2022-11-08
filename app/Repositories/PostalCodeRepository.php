<?php

namespace App\Repositories;

use App\Models\PostalCode;

class PostalCodeRepository
{
    public function showPostalCode($postal_code_id): PostalCode
    {
        $postal_code = PostalCode::findorFail($postal_code_id);

        return $postal_code;
    }
}
