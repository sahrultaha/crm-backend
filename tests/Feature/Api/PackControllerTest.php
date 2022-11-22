<?php

namespace Tests\Feature\Api;

use App\Models\Number;
use App\Models\Pack;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PackControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_search_for_number_in_packs()
    {
        $number_to_find = 1234567;
        $number = Number::factory()->create([
            'number' => $number_to_find,
        ]);

        Pack::factory()->count(10)->create();
        $pack_to_find = Pack::factory()->create([
            'number_id' => $number->id,
        ]);

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
}
