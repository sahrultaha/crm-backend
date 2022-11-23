<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CountryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_get_all_countries()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/country');
        $response->assertStatus(200);
    }
}
