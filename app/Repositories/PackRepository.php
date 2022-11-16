<?php

namespace App\Repositories;

use App\Http\Resources\PackResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PackRepository extends BaseRepository
{
    public function getList($query): AnonymousResourceCollection
    {
        $limit = $query['limit'] ?? 10;
        if (! is_numeric($limit) || intval($limit) === 0) {
            $limit = 10;
        }

        $sort = $query['sort'] ?? 'desc';
        if ($sort !== 'asc' && $sort !== 'desc') {
            $sort = 'desc';
        }

        $builder = $this->model->newQuery()->orderBy('id', $sort);
        $builder->with('number');

        if (isset($query['number'])) {
            $number_to_find = $query['number'];
            $builder->whereHas('number', function (Builder $builder) use ($number_to_find) {
                $builder->where('number', '=', $number_to_find);
            });
        }

        return PackResource::collection(
            $builder->paginate($limit)
        );
    }
}
