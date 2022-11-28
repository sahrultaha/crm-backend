<?php

namespace Tests\Feature\Api;

use App\Models\Number;
use App\Models\NumberCategory;
use App\Models\NumberStatus;
use App\Models\NumberType;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\NumberTypeStatusCategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class NumberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_create_new_number()
    {
        $this->seed(NumberTypeStatusCategorySeeder::class);

        $number_type = NumberType::first();
        $number_status = NumberStatus::first();
        $number_category = NumberCategory::first();
        $created_at = now();
        $this->assertDatabaseCount('number', 0);

        $response = $this->postJson('/api/msisdn', [
            'number' => 8188181,
            'number_type_id' => $number_type->id,
            'number_status_id' => $number_status->id,
            'number_category_id' => $number_category->id,
            'created_at' => $created_at,
        ]);

        $response->assertUnauthorized();
        $this->assertDatabaseCount('number', 0);
    }

    public function test_users_can_create_new_number()
    {
        $this->seed(NumberTypeStatusCategorySeeder::class);

        $number_type = NumberType::first();
        $number_status = NumberStatus::first();
        $number_category = NumberCategory::first();
        $created_at = now();
        $user = User::factory()->create();
        $this->assertDatabaseCount('number', 0);

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/msisdn', [
            'number' => 8188181,
            'number_type_id' => $number_type->id,
            'number_status_id' => $number_status->id,
            'number_category_id' => $number_category->id,
            'created_at' => $created_at,
        ]);

        $response->assertCreated();

        $this->assertDatabaseCount('number', 1);
        $new_number = Number::first();
        $response->assertJsonPath('id', $new_number->id);
    }

    public function test_guests_cannot_view_msisdn_list()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/msisdn');

        $response->assertUnauthorized();
    }

    public function test_users_can_view_msisdn_list()
    {
        $this->seed(DatabaseSeeder::class);

        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/msisdn/')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'number',
                        'number_type_id',
                        'number_status_id',
                        'number_category_id',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                    ],
                ],
            ]);
    }
}
