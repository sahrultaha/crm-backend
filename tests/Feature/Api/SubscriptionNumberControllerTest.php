<?php

namespace Tests\Feature\Api;

use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Models\Imsi;
use App\Models\Number;
use App\Models\User;
use App\Models\Customer;
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

    public function test_users_can_view_subscription_list_of_single_customer()
    {   
        $this->seed(DatabaseSeeder::class);
        
        $customer = Customer::factory()->create();
        $customer_id = $customer->id;
        
        Sanctum::actingAs(User::factory()->create());

        $this->getJson(`/api/subscription/${customer_id}`)
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                        'id',
                ],
            ]);
    }

}
