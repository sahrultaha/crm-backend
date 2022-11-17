<?php

namespace Tests\Feature\Repository;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BaseRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_paginate()
    {
        User::factory()->count(25)->create();

        $repo = new BaseRepository(new User());
        $paginator = $repo->paginate(10, 'desc');

        $this->assertInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class, $paginator);
        $this->assertCount(10, $paginator->items());
        $this->assertEquals(25, $paginator->items()[0]['id']);

        $middle = $repo->paginate(10, 'desc', 2);
        $this->assertCount(10, $middle->items());
        $this->assertEquals(15, $middle->items()[0]['id']);
    }
}
