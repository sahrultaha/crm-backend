<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->newInstance($attributes);
    }

    public function find(int $id): Model | null
    {
        return $this->model->newQuery()->find($id);
    }

    public function update(int $id, array $attributes): int
    {
        return $this->model->newQuery()
            ->whereKey($id)
            ->update($attributes);
    }

    public function delete(int $id): int | null
    {
        return $this->model->newQuery()
            ->whereKey($id)
            ->delete();
    }
}
