<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Database\Seeders\Skeleton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ImsiBulkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_access()
    {
        $this->seed(Skeleton::class);
        Sanctum::actingAs(User::factory()->create());
        $response = $this->getJson('/api/imsi/bulk');

        $response->assertOk();
    }
}
