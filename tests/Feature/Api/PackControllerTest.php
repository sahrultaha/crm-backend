<?php

namespace Tests\Feature\Api;

use App\Models\Number;
use App\Models\Pack;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PackControllerTest extends TestCase
{
    protected $seed = true;

    use RefreshDatabase;

    public function test_users_can_search_for_number_in_packs()
    {
        Pack::factory()->count(10)->create();
        $number_to_find = 1234567;
        $number = Number::factory()->create([
            'number' => $number_to_find,
        ]);
        $pack_to_find = Pack::factory()->create([
            'number_id' => $number->id,
        ]);
        $this->assertTrue(11 <= Pack::count());

        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/packs?number='.$number_to_find)
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'number_id',
                        'imsi_id',
                        'product_id',
                        'pack_type_id',
                        'installation_date',
                        'expiry_date',
                        'number' => [
                            'id',
                            'number',
                        ],
                        'imsi' => [
                            'id',
                            'imsi',
                        ],
                        'product' => [
                            'id',
                            'name',
                        ],
                    ],
                ],
            ])
            ->assertJsonPath('data.0.id', $pack_to_find->id)
            ->assertJsonPath('data.0.number_id', $number->id);
    }

    public function test_users_can_view_pack_details()
    {
        $pack = Pack::factory()->create();
        $pack_id = $pack->id;

        Sanctum::actingAs(User::factory()->create());

        $this->getJson("/api/packs/{$pack_id}")
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'number_id',
                'imsi_id',
                'product_id',
                'pack_type_id',
                'installation_date',
                'expiry_date',
            ])
            ->assertJsonPath('id', $pack_id);
    }

    public function test_users_can_create_new_packs()
    {
        $product = Product::factory()->create([
            'product_profile_id' => 1,
            'product_network_id' => 1,
        ]);

        $today = now();
        $this->assertDatabaseCount('imsi', 0);
        $this->assertDatabaseCount('number', 0);
        $this->assertDatabaseCount('pack', 0);

        Sanctum::actingAs(User::factory()->create());
        $this->postJson('/api/packs', [
            'number' => 1234567,
            'imsi' => 12345678,
            'pin' => 1234,
            'puk_1' => 12344321,
            'puk_2' => 12344321,
            'product_id' => $product->id,
            'installation_date' => $today,
            'expiry_date' => $today->addYears(5),
        ])->assertOk()->assertJsonStructure(['id']);

        $this->assertDatabaseCount('imsi', 1);
        $this->assertDatabaseCount('number', 1);
        $this->assertDatabaseCount('pack', 1);
    }
}
