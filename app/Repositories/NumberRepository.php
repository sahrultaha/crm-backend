<?php

namespace App\Repositories;

use App\Http\Resources\NumberResource;
use App\Models\Number;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NumberRepository extends BaseRepository
{
    public function getNumbers($query): AnonymousResourceCollection
    {
        $limit = $query['limit'] ?? 10;
        if (! is_numeric($limit) || intval($limit) === 0) {
            $limit = 10;
        }

        $sort = $query['sort'] ?? 'desc';
        if ($sort !== 'asc' && $sort !== 'desc') {
            $sort = 'desc';
        }

        $builder = Number::query()->orderBy('id', $sort);

        return NumberResource::collection(
            $builder->paginate($limit)
        );
    }
}
