<?php

namespace Tests\Feature\Api;

use App\Models\File;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ImsiBulkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_guest()
    {
        $response = $this->getJson('/api/imsi/bulk');

        $response->assertUnauthorized();
    }

    public function test_index_access()
    {
        $this->seed(\Database\Seeders\FileSeeder::class);
        $repo = new BaseRepository(new File());
        $paginator = $repo->paginate();
        $this->assertEquals(15, $paginator->total());
        Sanctum::actingAs(User::factory()->create());
        $response = $this->getJson('/api/imsi/bulk');

        $response->assertOk();

        $response->assertJsonPath('meta.total', 5);
    }
}
