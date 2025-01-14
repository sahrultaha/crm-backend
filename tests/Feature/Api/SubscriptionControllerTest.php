<?php

namespace Tests\Feature\Api;

use App\Models\Customer;
use App\Models\Pack;
use App\Models\SubscriptionStatus;
use App\Models\SubscriptionType;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ImsiSeeder;
use Database\Seeders\NumberSeeder;
use Database\Seeders\PackSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SubscriptionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_create_a_subscription_for_a_customer()
    {
        $this->seed([
            DatabaseSeeder::class,
            NumberSeeder::class,
            ImsiSeeder::class,
            ProductSeeder::class,
            PackSeeder::class,
        ]);

        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $sub_status = SubscriptionStatus::first();
        $sub_type = SubscriptionType::first();
        $pack = Pack::first();

        $this->assertDatabaseCount('subscription', 0);
        $this->assertDatabaseCount('subscription_number', 0);

        $today = now();

        Sanctum::actingAs($user);
        $this->postJson('/api/subscriptions', [
            'customer_id' => $customer->id,
            'registration_date' => $today->subHours(2),
            'subscription_status_id' => $sub_status->id,
            'subscription_type_id' => $sub_type->id,
            'number_id' => $pack->number_id,
            'imsi_id' => $pack->imsi_id,
            'activation_date' => $today->subHour(),
        ])->assertCreated();

        $this->assertDatabaseCount('subscription', 1);
        $this->assertDatabaseCount('subscription_number', 1);
    }

    public function test_guests_cannot_view_subscription_list()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/subscriptions');

        $response->assertUnauthorized();
    }

    public function test_users_can_view_subscription_list()
    {
        $this->seed(DatabaseSeeder::class);

        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/subscriptions/')
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
                        'subscription' => [
                            'subscription_type',
                            'subscription_status',
                        ],
                        'customer',
                        'number',
                    ],
                ],
            ]);
    }

    public function test_user_can_fetch_subscription_status_list()
    {
        $this->seed([
            DatabaseSeeder::class,
            NumberSeeder::class,
            ImsiSeeder::class,
            ProductSeeder::class,
            PackSeeder::class,
        ]);

        Sanctum::actingAs(User::factory()->create());
        $response = $this->getJson('/api/subscriptions/status')
        ->assertOk()
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ],
            ],
        ]);
    }

    public function test_user_can_update_subscription_status()
    {
        $this->seed([
            DatabaseSeeder::class,
            NumberSeeder::class,
            ImsiSeeder::class,
            ProductSeeder::class,
            PackSeeder::class,
        ]);
        Sanctum::actingAs(User::factory()->create());
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $sub_status = SubscriptionStatus::first();
        $sub_type = SubscriptionType::first();
        $pack = Pack::first();

        $this->assertDatabaseCount('subscription', 0);
        $this->assertDatabaseCount('subscription_number', 0);

        $today = now();

        Sanctum::actingAs($user);
        $this->postJson('/api/subscriptions', [
            'customer_id' => $customer->id,
            'registration_date' => $today->subHours(2),
            'subscription_status_id' => $sub_status->id,
            'subscription_type_id' => $sub_type->id,
            'number_id' => $pack->number_id,
            'imsi_id' => $pack->imsi_id,
            'activation_date' => $today->subHour(),
        ])->assertCreated();

        $this->assertDatabaseCount('subscription', 1);
        $this->assertDatabaseCount('subscription_number', 1);

        $response = $this->postJson('/api/subscriptions/1', [
            'subscription_status_id' => 2,
            '_method' => 'PATCH',
        ])
        ->assertOk()
        ->assertStatus(200);
        $this->assertEquals($response['subscription_status_id'], 2);
    }
}
