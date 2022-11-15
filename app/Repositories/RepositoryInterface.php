<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function create(array $attributes): Model;

    public function update(int $id, array $attributes): int;

    public function find(int $id): Model|null;

    public function delete(int $id): int | null;
}
