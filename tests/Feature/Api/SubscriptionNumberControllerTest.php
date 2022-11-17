<?php

namespace Tests\Feature\Api;

use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Models\Imsi;
use App\Models\Number;
use App\Models\User;
use Database\Seeders\Skeleton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SubscriptionNumberControllerTest extends TestCase
{
    use RefreshDatabase;

    // public function test_users_can_view_subscription_list()
    // {      
    //     get number
    //     get imsi
    //     create new subscription
    //     get subscription id with customer id

    //     search customer id in subscription list
    //     get subscription id

    //     query subscription number table with subscription id
        
    //     $this->seed(Skeleton::class);

    //     Subscription::factory()->count(3)->create();

    //     Sanctum::actingAs(User::factory()->create());

    //     $this->getJson('/api/subscriptions/')
    //         ->assertOk()
    //         ->assertJsonCount(3, 'data')
    //         ->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                     'id',
    //                     'subscription_id',
    //                     'number_id',
    //                     'imsi_id',
    //                     'activation_date',
    //                     'created_at',
    //                     'updated_at',
    //                 ],
    //             ],
    //         ])
    //         ->assertJsonPath('meta.total', 3);
    // }

}
