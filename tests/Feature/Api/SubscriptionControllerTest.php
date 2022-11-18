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
}
