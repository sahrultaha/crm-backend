<?php

namespace Tests\Feature\Api;

use App\Models\User;
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
        Sanctum::actingAs(User::factory()->create());
        $response = $this->getJson('/api/imsi/bulk');

        $response->assertOk();
    }
}
