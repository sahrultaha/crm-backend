<?php

namespace Tests\Feature\Repository;

use App\Models\Customer;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SubscriptionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /* @var  SubscriptionRepository */
    protected $repo;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_list_of_subscriptions()
    {
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

    public function setUp(): void
    {
        parent::setUp();
        $this->repo = new SubscriptionRepository();
    }

    public function test_get_numbers()
    {
        $count = Customer::count();
        $customer = Customer::factory()->create();
        $this->assertDatabaseCount('customer', $count + 1);

        $count = Subscription::count();
        $subscription = Subscription::factory()->create(['customer_id' => $customer->id]);
        $this->assertDatabaseCount('subscription', $count + 1);

        $count = SubscriptionNumber::count();
        SubscriptionNumber::factory()->create(['subscription_id' => $subscription->id]);
        $this->assertDatabaseCount('subscription_number', $count + 1);

        $numbers = $this->repo->selectNumbers($customer->id);
        $this->assertCount(1, $numbers);
    }
}
