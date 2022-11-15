<?php

namespace Tests\Feature\Api;

use App\Models\Imsi;
use App\Models\ImsiStatus;
use App\Models\ImsiType;
use App\Models\User;
use Database\Seeders\Skeleton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ImsiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_create_new_imsi()
    {
        $this->seed(Skeleton::class);

        $imsi_status = ImsiStatus::first();
        $imsi_type = ImsiType::first();
        $this->assertDatabaseCount('imsi', 0);

        $response = $this->postJson('/api/imsi', [
            'imsi' => 1234567890,
            'imsi_status_id' => $imsi_status->id,
            'imsi_type_id' => $imsi_type->id,
            'pin' => 1234,
            'puk_1' => 123456,
            'puk_2' => 123456,
        ]);

        $response->assertUnauthorized();
        $this->assertDatabaseCount('imsi', 0);
    }

    public function test_users_can_create_new_imsi()
    {
        $this->seed(Skeleton::class);

        $imsi_status = ImsiStatus::first();
        $imsi_type = ImsiType::first();
        $user = User::factory()->create();
        $this->assertDatabaseCount('imsi', 0);

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/imsi', [
            'imsi' => 1234567890,
            'imsi_status_id' => $imsi_status->id,
            'imsi_type_id' => $imsi_type->id,
            'pin' => 1234,
            'puk_1' => 123456,
            'puk_2' => 123456,
        ]);

        $response->assertCreated();

        $this->assertDatabaseCount('imsi', 1);
        $new_imsi = Imsi::first();
        $response->assertJsonPath('id', $new_imsi->id);
    }

    public function test_users_can_view_imsi_list()
    {
        $this->seed(Skeleton::class);

        Imsi::factory()->count(3)->create();

        Sanctum::actingAs(User::factory()->create());

        $this->getJson("/api/imsi")
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'created_at',
                        'updated_at',
                        'imsi',
                        'imsi_status_id',
                        'imsi_type_id',
                        'pin',
                        'puk_1',
                        'puk_2',
                    ],
                ],
            ])
            ->assertJsonPath('meta.total', 3);
    }

    public function test_users_can_update_existing_imsi()
    {
        $this->seed(Skeleton::class);

        $old_imsi = Imsi::factory()->create([
            'imsi' => 1234567890,
            'imsi_status_id' => ImsiStatus::find(1)->id,
            'imsi_type_id' => ImsiType::find(1)->id,
            'pin' => 1234,
            'puk_1' => 123456,
            'puk_2' => 123457,
        ]);
        $old_imsi_id = $old_imsi->id;
        $this->assertDatabaseCount('imsi', 1);

        $new_imsi_number = 1234567891;
        $new_imsi_status_id = ImsiStatus::find(2)->id;
        $new_imsi_type_id = ImsiType::find(2)->id;
        $new_pin = 1235;
        $new_puk_1 = 223456;
        $new_puk_2 = 223457;

        Sanctum::actingAs(User::factory()->create());

        $response = $this->putJson("/api/imsi/$old_imsi_id", [
            'imsi' => $new_imsi_number,
            'imsi_status_id' => $new_imsi_status_id,
            'imsi_type_id' => $new_imsi_type_id,
            'pin' => $new_pin,
            'puk_1' => $new_puk_1,
            'puk_2' => $new_puk_2,
        ]);

        $response->assertOk();

        $this->assertDatabaseCount('imsi', 1);
        $new_imsi = Imsi::first();
        $response->assertJsonPath('id', $new_imsi->id);
        $this->assertEquals($new_imsi_number, $new_imsi->imsi);
        $this->assertEquals($new_imsi_status_id, $new_imsi->imsi_status_id);
        $this->assertEquals($new_imsi_type_id, $new_imsi->imsi_type_id);
        $this->assertEquals($new_pin, $new_imsi->pin);
        $this->assertEquals($new_puk_1, $new_imsi->puk_1);
        $this->assertEquals($new_puk_2, $new_imsi->puk_2);
    }

    public function test_passing_null_values_doesnt_update_existing_imsi_properties()
    {
        $this->seed(Skeleton::class);

        $old_imsi_number = 1234567890;
        $old_imsi_status_id = ImsiStatus::find(1)->id;
        $old_imsi_type_id = ImsiType::find(1)->id;
        $old_pin = 1234;
        $old_puk_1 = 123456;
        $old_puk_2 = 123457;

        $old_imsi = Imsi::factory()->create([
            'imsi' => $old_imsi_number,
            'imsi_status_id' => $old_imsi_status_id,
            'imsi_type_id' => $old_imsi_type_id,
            'pin' => $old_pin,
            'puk_1' => $old_puk_1,
            'puk_2' => $old_puk_2,
        ]);
        $old_imsi_id = $old_imsi->id;

        $this->assertDatabaseCount('imsi', 1);

        Sanctum::actingAs(User::factory()->create());

        $new_pin = 1235;
        $response = $this->putJson("/api/imsi/$old_imsi_id", [
            'imsi' => null,
            'imsi_status_id' => null,
            'imsi_type_id' => null,
            'pin' => $new_pin,
            'puk_1' => null,
            'puk_2' => null,
        ]);

        $response->assertOk();

        $this->assertDatabaseCount('imsi', 1);
        $new_imsi = Imsi::first();
        $response->assertJsonPath('id', $new_imsi->id);
        $this->assertEquals($old_imsi_number, $new_imsi->imsi);
        $this->assertEquals($old_imsi_status_id, $new_imsi->imsi_status_id);
        $this->assertEquals($old_imsi_type_id, $new_imsi->imsi_type_id);
        $this->assertEquals($new_pin, $new_imsi->pin);
        $this->assertEquals($old_puk_1, $new_imsi->puk_1);
        $this->assertEquals($old_puk_2, $new_imsi->puk_2);
    }

    public function test_users_can_view_existing_imsi_details()
    {
        $this->seed(Skeleton::class);

        $imsi_status = ImsiStatus::first();
        $imsi_type = ImsiType::first();
        $user = User::factory()->create();
        $new_imsi = Imsi::factory()->create([
            'imsi' => 1234567890,
            'imsi_status_id' => $imsi_status->id,
            'imsi_type_id' => $imsi_type->id,
            'pin' => 1234,
            'puk_1' => 123456,
            'puk_2' => 123456,
        ]);
        $new_imsi_id = $new_imsi->id;

        Sanctum::actingAs($user);
        $response = $this->getJson("/api/imsi/$new_imsi_id");

        $response->assertOk()
            ->assertJsonPath('id', $new_imsi->id)
            ->assertJsonPath('imsi', $new_imsi->imsi)
            ->assertJsonPath('imsi_status_id', $new_imsi->imsi_status_id)
            ->assertJsonPath('imsi_type_id', $new_imsi->imsi_type_id)
            ->assertJsonPath('pin', $new_imsi->pin)
            ->assertJsonPath('puk_1', $new_imsi->puk_1)
            ->assertJsonPath('puk_2', $new_imsi->puk_2);
    }
}
