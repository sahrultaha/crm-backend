<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->newInstance($attributes);
    }

    public function find(int $id)
    {
        return $this->model->newQuery()->find($id);
    }

    public function update(int $id, array $attributes)
    {
        return $this->model->newQuery()
            ->whereKey($id)
            ->update($attributes);
    }

    public function delete(int $id)
    {
        return $this->model->newQuery()
            ->whereKey($id)
            ->delete();
    }
}
