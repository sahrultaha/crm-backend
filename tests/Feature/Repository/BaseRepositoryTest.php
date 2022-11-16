<?php

namespace Tests\Feature\Repository;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_paginate()
    {
        $this->seed([
            \Database\Seeders\RowStatusSeeder::class,
            \Database\Seeders\FileSeeder::class,
        ]);
        User::factory()->count(25)->create();

        $repo = new \App\Repositories\BaseRepository(new User());
        $paginator = $repo->paginate();
        $this->assertInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class, $paginator);
        $this->assertCount(10, $paginator->items());
    }
}
