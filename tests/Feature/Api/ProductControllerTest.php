<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_get_list_of_products()
    {
        Product::factory()->count(10)->create();

        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/products')
            ->assertOk()
            ->assertJsonCount(10, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'product_profile_id',
                        'product_network_id',
                    ],
                ],
                'meta',
            ])
            ->assertJsonPath('meta.total', 10);
    }
}
