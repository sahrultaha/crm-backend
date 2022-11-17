<?php

namespace Tests\Feature\Api;

use App\Models\File;
use App\Models\FileBulkImsi;
use App\Models\FileCategory;
use App\Models\RowStatus;
use App\Models\User;
use Database\Seeders\FileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ImsiBulkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_guest()
    {
        $response = $this->getJson('/api/imsi/bulk');

        $response->assertUnauthorized();
    }

    public function test_index_access()
    {
        $this->seed([
            FileSeeder::class,
            \Database\Seeders\RowStatusSeeder::class,
            \Database\Seeders\ImsiTypeStatusSeeder::class,
        ]);
        File::factory()->count(5)->create(['file_category_id' => FileCategory::BULK_IMSI_FILE]);
        FileBulkImsi::factory()->count(3)->create(['file_id' => 5]);
        FileBulkImsi::factory()->count(2)->create(['file_id' => 5, 'row_status_id' => RowStatus::FAIL]);
        FileBulkImsi::factory()->count(1)->create(['file_id' => 5, 'row_status_id' => RowStatus::SUCCESS]);

        Sanctum::actingAs(User::factory()->create());
        $response = $this->getJson('/api/imsi/bulk');

        $response->assertOk();
        $json = $response->decodeResponseJson();

        $this->assertEquals(5, $json['meta']['total']);
        $this->assertEquals(5, $json['data'][0]['id']);
        $this->assertEquals(3, $json['data'][0]['file_bulk_imsi_count_new']);
        $this->assertEquals(2, $json['data'][0]['file_bulk_imsi_count_fail']);
        $this->assertEquals(1, $json['data'][0]['file_bulk_imsi_count_success']);
        $this->assertEquals(0, $json['data'][1]['file_bulk_imsi_count_new']);
        $this->assertEquals(0, $json['data'][1]['file_bulk_imsi_count_fail']);
        $this->assertEquals(0, $json['data'][1]['file_bulk_imsi_count_success']);
    }
}
