<?php

namespace Tests\Feature\Api;

use App\Models\AccountCategory;
use App\Models\Country;
use App\Models\Customer;
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

    private function generateCustomerPostData(): array
    {
        $ic_type = IcType::factory()->create();
        $ic_color = IcColor::factory()->create();
        $country = Country::factory()->create();
        $customer_title = CustomerTitle::factory()->create();
        $account_category = AccountCategory::factory()->create();

        $customer_name = 'Abc';
        $customer_email = 'test@mail.com';
        $customer_mobile_number = '8765432';
        $customer_ic_number = '00000001';
        $customer_ic_type_id = $ic_type->id;
        $customer_ic_color_id = $ic_color->id;
        $customer_ic_expiry_date = '2100-01-20';
        $customer_country_id = $country->id;
        $customer_title_id = $customer_title->id;
        $customer_account_category_id = $account_category->id;
        $customer_birth_date = '2100-01-20';

        return [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ];
    }

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

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'email' => $customer_email,
            'mobile_number' => $customer_mobile_number,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_color_id' => $customer_ic_color_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $this->assertEquals($customer->name, $customer_name);
        $this->assertEquals($customer->email, $customer_email);
        $this->assertEquals($customer->mobile_number, $customer_mobile_number);
        $this->assertEquals($customer->ic_number, $customer_ic_number);
        $this->assertEquals($customer->ic_type_id, $customer_ic_type_id);
        $this->assertEquals($customer->ic_color_id, $customer_ic_color_id);
        $this->assertEquals($customer->ic_expiry_date, $customer_ic_expiry_date);
        $this->assertEquals($customer->country_id, $customer_country_id);
        $this->assertEquals($customer->customer_title_id, $customer_title_id);
        $this->assertEquals($customer->account_category_id, $customer_account_category_id);
        $this->assertEquals($customer->birth_date, $customer_birth_date);
    }

    public function test_users_can_create_new_customer_without_email()
    {
        $user = User::factory()->create();

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'mobile_number' => $customer_mobile_number,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_color_id' => $customer_ic_color_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $this->assertEquals($customer->name, $customer_name);
        $this->assertNull($customer->email);
        $this->assertEquals($customer->mobile_number, $customer_mobile_number);
        $this->assertEquals($customer->ic_number, $customer_ic_number);
        $this->assertEquals($customer->ic_type_id, $customer_ic_type_id);
        $this->assertEquals($customer->ic_color_id, $customer_ic_color_id);
        $this->assertEquals($customer->ic_expiry_date, $customer_ic_expiry_date);
        $this->assertEquals($customer->country_id, $customer_country_id);
        $this->assertEquals($customer->customer_title_id, $customer_title_id);
        $this->assertEquals($customer->account_category_id, $customer_account_category_id);
        $this->assertEquals($customer->birth_date, $customer_birth_date);
    }

    public function test_users_can_create_new_customer_without_mobile_number()
    {
        $user = User::factory()->create();

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'email' => $customer_email,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_color_id' => $customer_ic_color_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $this->assertEquals($customer->name, $customer_name);
        $this->assertEquals($customer->email, $customer_email);
        $this->assertNull($customer->mobile_number);
        $this->assertEquals($customer->ic_number, $customer_ic_number);
        $this->assertEquals($customer->ic_type_id, $customer_ic_type_id);
        $this->assertEquals($customer->ic_color_id, $customer_ic_color_id);
        $this->assertEquals($customer->ic_expiry_date, $customer_ic_expiry_date);
        $this->assertEquals($customer->country_id, $customer_country_id);
        $this->assertEquals($customer->customer_title_id, $customer_title_id);
        $this->assertEquals($customer->account_category_id, $customer_account_category_id);
        $this->assertEquals($customer->birth_date, $customer_birth_date);
    }

    public function test_users_can_create_new_customer_without_ic_color_id()
    {
        $user = User::factory()->create();

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'email' => $customer_email,
            'mobile_number' => $customer_mobile_number,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $this->assertEquals($customer->name, $customer_name);
        $this->assertEquals($customer->email, $customer_email);
        $this->assertEquals($customer->mobile_number, $customer_mobile_number);
        $this->assertEquals($customer->ic_number, $customer_ic_number);
        $this->assertEquals($customer->ic_type_id, $customer_ic_type_id);
        $this->assertNull($customer->ic_color_id);
        $this->assertEquals($customer->ic_expiry_date, $customer_ic_expiry_date);
        $this->assertEquals($customer->country_id, $customer_country_id);
        $this->assertEquals($customer->customer_title_id, $customer_title_id);
        $this->assertEquals($customer->account_category_id, $customer_account_category_id);
        $this->assertEquals($customer->birth_date, $customer_birth_date);
    }

    public function test_users_can_create_new_customer_without_customer_title_id()
    {
        $user = User::factory()->create();

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'email' => $customer_email,
            'mobile_number' => $customer_mobile_number,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_color_id' => $customer_ic_color_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $this->assertEquals($customer->name, $customer_name);
        $this->assertEquals($customer->email, $customer_email);
        $this->assertEquals($customer->mobile_number, $customer_mobile_number);
        $this->assertEquals($customer->ic_number, $customer_ic_number);
        $this->assertEquals($customer->ic_type_id, $customer_ic_type_id);
        $this->assertEquals($customer->ic_color_id, $customer_ic_color_id);
        $this->assertEquals($customer->ic_expiry_date, $customer_ic_expiry_date);
        $this->assertEquals($customer->country_id, $customer_country_id);
        $this->assertNull($customer->customer_title_id);
        $this->assertEquals($customer->account_category_id, $customer_account_category_id);
        $this->assertEquals($customer->birth_date, $customer_birth_date);
    }

    public function test_users_can_create_new_customer_without_email_mobile_ic_color_and_customer_title()
    {
        $user = User::factory()->create();

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $this->assertEquals($customer->name, $customer_name);
        $this->assertNull($customer->email);
        $this->assertNull($customer->mobile_number);
        $this->assertNull($customer->ic_color_id);
        $this->assertNull($customer->customer_title_id);
        $this->assertEquals($customer->ic_number, $customer_ic_number);
        $this->assertEquals($customer->ic_type_id, $customer_ic_type_id);
        $this->assertEquals($customer->ic_expiry_date, $customer_ic_expiry_date);
        $this->assertEquals($customer->country_id, $customer_country_id);
        $this->assertEquals($customer->account_category_id, $customer_account_category_id);
        $this->assertEquals($customer->birth_date, $customer_birth_date);
    }

    public function test_after_creating_new_customer_endpoint_returns_id_of_new_customer()
    {
        $user = User::factory()->create();

        [
            $customer_name,
            $customer_email,
            $customer_mobile_number,
            $customer_ic_number,
            $customer_ic_type_id,
            $customer_ic_color_id,
            $customer_ic_expiry_date,
            $customer_country_id,
            $customer_title_id,
            $customer_account_category_id,
            $customer_birth_date,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'email' => $customer_email,
            'mobile_number' => $customer_mobile_number,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_color_id' => $customer_ic_color_id,
            'ic_expiry_date' => $customer_ic_expiry_date,
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
        ]);

        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $response
            ->assertCreated()
            ->assertJsonPath('id', $customer->id);
    }
}
