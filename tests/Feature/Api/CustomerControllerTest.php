<?php

namespace Tests\Feature\Api;

use App\Models\Country;
use App\Models\CustomerTitle;
use App\Models\IcColor;
use App\Models\IcType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_create_new_customer()
    {
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', []);

        $response->assertUnauthorized();
        $this->assertDatabaseCount('customer', 0);
    }

    public function test_users_can_create_new_customer()
    {
        $user = User::factory()->create();
        $ic_type = IcType::factory()->create();
        $ic_color = IcColor::factory()->create();
        $country = Country::factory()->create();
        $customer_title = CustomerTitle::factory()->create();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => 'Abc',
            'ic_number' => '00000001',
            'ic_type_id' => $ic_type->id,
            'ic_color_id' => $ic_color->id,
            'ic_expiry_date' => '01/01/01',
            'country_id' => $country->id,
            'customer_title_id' => $customer_title->id,
            'birth_date' => '01/01/02',
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
    }
}
