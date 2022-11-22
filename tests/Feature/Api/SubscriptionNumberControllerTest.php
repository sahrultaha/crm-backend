<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SubscriptionNumberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_view_subscription_list()
    {
        $this->seed(DatabaseSeeder::class);

        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/subscription/')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'customer_id',
                        'registration_date',
                        'subscription_status_id',
                        'subscription_type_id',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                    ],
                ],
            ]);
    }
}
