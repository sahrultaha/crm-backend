<?php

namespace App\Repositories;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductRepository extends BaseRepository
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

        return ProductResource::collection(
            $builder->paginate($limit)
        );
    }
}
