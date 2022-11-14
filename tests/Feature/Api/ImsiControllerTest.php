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
}
