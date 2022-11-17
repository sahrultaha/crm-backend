<?php

namespace Tests\Feature\Repository;

use App\Models\File;
use App\Models\FileCategory;
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

    public function test_paginate_where()
    {
        $this->seed([
            \Database\Seeders\FileSeeder::class,
            \Database\Seeders\RowStatusSeeder::class,
        ]);

        File::factory()->count(15)->create();
        File::factory()->count(5)->create(['file_category_id' => FileCategory::BULK_IMSI_FILE]);

        $repo = new BaseRepository(new File());
        $paginator = $repo->paginate(10, 'desc', 1, [['file_category_id' => FileCategory::BULK_IMSI_FILE]]);
        $this->assertEquals(5, $paginator->total());
        $this->assertEquals(20, $paginator->items()[0]['id']);
    }
}
