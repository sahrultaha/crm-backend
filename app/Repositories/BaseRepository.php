<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        $model = $this->model->newInstance($attributes);
        if ($model->save()) {
            return $model;
        }
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

    public function select(array $attributes): \Illuminate\Database\Eloquent\Collection
    {
        $builder = $this->model->newQuery();
        foreach ($attributes as $key => $value) {
            if (is_array($value)) {
                $builder->whereIn($key, $value);
            } else {
                $builder->where($key, $value);
            }
        }

        return $builder->get();
    }

    public function save(Model $item): bool
    {
        return $item->save();
    }
}
