<?php

namespace Tests\Feature\Api;

use App\Models\AccountCategory;
use App\Models\Address;
use App\Models\AddressType;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerTitle;
use App\Models\District;
use App\Models\File;
use App\Models\FileCategory;
use App\Models\FileRelationType;
use App\Models\IcColor;
use App\Models\IcType;
use App\Models\Mukim;
use App\Models\PostalCode;
use App\Models\User;
use App\Models\Village;
use Database\Seeders\FileSeeder;
use Database\Seeders\Skeleton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([Skeleton::class]);
    }

    private function generateCustomerPostData(): array
    {
        $ic_type = IcType::find(1); // Personal
        $ic_color = IcColor::find(1); // Yellow
        $country = Country::factory()->create();
        $customer_title = CustomerTitle::factory()->create();
        $account_category = AccountCategory::factory()->create();
        $village = Village::factory()->create();
        $address_type = AddressType::factory()->create();
        $mukim = Mukim::factory()->create(); //test address factory
        $district = District::factory()->create();
        $postalcode = PostalCode::factory()->create();

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
        $customer_birth_date = '2000-01-20';
        $customer_village = $village->id;
        $village = $village->name;
        $customer_mukim_id = $mukim->id;
        $customer_district_id = $district->id;
        $customer_postal_code_id = $postalcode->id;
        $customer_house_number = 'No 1';
        $customer_simpang = 'Simpang 5';
        $customer_street = 'Jalan Utara';
        $customer_building_name = 'Bangunan tinggi';
        $customer_block = 'Block B';
        $customer_floor = '6th Floor';
        $customer_unit = 'Unit 6';
        $address_type_id = $address_type->id;

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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
        ];
    }

    private function getInvalidPersonalIcValues(): array
    {
        return [
            '60123456', // first two digits cannot be 60
            '001', // length must be 8
            '3098218717210', // length must be 8
            '01abcdef', // no alphabets
            '50-876213', // no dashes
            '30 76543', // no spaces
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
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

    public function test_users_cannot_create_new_customer_with_invalid_ics()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        foreach ($this->getInvalidPersonalIcValues() as $ic) {
            $response = $this->postJson('/api/customers', [
                'name' => $customer_name,
                'email' => $customer_email,
                'mobile_number' => $customer_mobile_number,
                'ic_number' => $ic,
                'ic_type_id' => $customer_ic_type_id,
                'ic_color_id' => $customer_ic_color_id,
                'ic_expiry_date' => $customer_ic_expiry_date,
                'country_id' => $customer_country_id,
                'customer_title_id' => $customer_title_id,
                'account_category_id' => $customer_account_category_id,
                'birth_date' => $customer_birth_date,
                'village_id' => $customer_village,
                'district_id' => $customer_district_id,
                'mukim_id' => $customer_mukim_id,
                'postal_code_id' => $customer_postal_code_id,
                'house_number' => $customer_house_number,
                'simpang' => $customer_simpang,
                'street' => $customer_street,
                'building_name' => $customer_building_name,
                'block' => $customer_block,
                'floor' => $customer_floor,
                'unit' => $customer_unit,
                'address_type_id' => $address_type_id,
            ]);

            $response->assertStatus(422)
                ->assertJsonValidationErrorFor('ic_number');
            $this->assertDatabaseCount('customer', 0);
        }
    }

    public function test_users_can_create_customer_without_following_strict_ic_rules_when_using_non_personal_ic_type()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);
        $this->assertDatabaseCount('customer', 0);

        foreach ($this->getInvalidPersonalIcValues() as $ic) {
            $response = $this->postJson('/api/customers', [
                'name' => $customer_name,
                'email' => $customer_email,
                'mobile_number' => $customer_mobile_number,
                'ic_number' => $ic,
                'ic_type_id' => 2, // Company
                'ic_color_id' => $customer_ic_color_id,
                'ic_expiry_date' => $customer_ic_expiry_date,
                'country_id' => $customer_country_id,
                'customer_title_id' => $customer_title_id,
                'account_category_id' => $customer_account_category_id,
                'birth_date' => $customer_birth_date,
                'village_id' => $customer_village,
                'district_id' => $customer_district_id,
                'mukim_id' => $customer_mukim_id,
                'postal_code_id' => $customer_postal_code_id,
                'house_number' => $customer_house_number,
                'simpang' => $customer_simpang,
                'street' => $customer_street,
                'building_name' => $customer_building_name,
                'block' => $customer_block,
                'floor' => $customer_floor,
                'unit' => $customer_unit,
                'address_type_id' => $address_type_id,
            ]);

            $response->assertCreated();
        }
        $this->assertDatabaseCount('customer', 6);
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);

        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();
        $response
            ->assertCreated()
            ->assertJsonPath('id', $customer->id);
    }

    public function test_users_can_view_customer_details()
    {
        Storage::fake('s3');
        $this->seed(FileSeeder::class);
        $user = User::factory()->create();
        $ic_front_category = FileCategory::find(1);
        $ic_back_category = FileCategory::find(2);
        $fake_file = UploadedFile::fake()->image('image.jpg');

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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
        $customer = Customer::first();

        $this->postJson('/api/files', [
            'file' => $fake_file,
            'relation_id' => $customer->id,
            'relation_type_id' => FileRelationType::CUSTOMER,
            'file_category_id' => $ic_front_category->id,
        ])->assertCreated();
        $this->assertDatabaseCount('file', 1);
        $this->assertDatabaseCount('file_relation', 1);

        $this->postJson('/api/files', [
            'file' => $fake_file,
            'relation_id' => $customer->id,
            'relation_type_id' => FileRelationType::CUSTOMER,
            'file_category_id' => $ic_back_category->id,
        ])->assertCreated();
        $this->assertDatabaseCount('file', 2);
        $this->assertDatabaseCount('file_relation', 2);

        $files = File::all()->toArray();
        $response = $this->getJson('/api/customers/'.$customer->id);
        $response
            ->assertOk()
            ->assertJsonPath('email', $customer_email)
            ->assertJsonPath('mobile_number', $customer_mobile_number)
            ->assertJsonPath('ic_number', $customer_ic_number)
            ->assertJsonPath('ic_type_id', $customer_ic_type_id)
            ->assertJsonPath('ic_color_id', $customer_ic_color_id)
            ->assertJsonPath('ic_expiry_date', $customer_ic_expiry_date)
            ->assertJsonPath('country_id', $customer_country_id)
            ->assertJsonPath('customer_title_id', $customer_title_id)
            ->assertJsonPath('account_category_id', $customer_account_category_id)
            ->assertJsonPath('file_ids.0', $files[0]['id'])
            ->assertJsonPath('file_ids.1', $files[1]['id'])
            ->assertJsonPath('birth_date', $customer_birth_date);
    }

    public function test_guests_cannot_access_list_of_customers()
    {
        Customer::factory()->count(5)->create();

        $response = $this->getJson('/api/customers');

        $response->assertUnauthorized();
    }

    public function test_users_can_access_list_of_customers()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers');

        $response
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'created_at',
                        'updated_at',
                        'name',
                        'email',
                        'mobile_number',
                        'ic_number',
                        'ic_type_id',
                        'ic_expiry_date',
                        'customer_title_id',
                        'birth_date',
                        'country_id',
                        'ic_color_id',
                        'account_category_id',
                    ],
                ],
            ])
            ->assertJsonPath('meta.total', 5);
    }

    public function test_customers_list_is_sorted_by_id_in_descending_order_by_default()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers');

        $response
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('data.0.id', 5)
            ->assertJsonPath('data.4.id', 1)
            ->assertJsonPath('meta.total', 5);
    }

    public function test_users_can_choose_asc_as_sorting_order_for_customers_list()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers?sort=asc');

        $response
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('data.0.id', 1)
            ->assertJsonPath('data.4.id', 5)
            ->assertJsonPath('meta.total', 5);
    }

    public function test_users_can_choose_desc_as_sorting_order_for_customers_list()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers?sort=desc');

        $response
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('data.0.id', 5)
            ->assertJsonPath('data.4.id', 1)
            ->assertJsonPath('meta.total', 5);
    }

    public function test_sort_query_string_defaults_to_desc_when_invalid_value_is_provided()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers?sort=HELLOWORLD');

        $response
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('data.0.id', 5)
            ->assertJsonPath('data.4.id', 1)
            ->assertJsonPath('meta.total', 5);
    }

    public function test_users_can_limit_number_of_customers_to_display()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers?limit=2');

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.total', 5)
            ->assertJsonPath('meta.per_page', 2);
    }

    public function test_limit_query_string_defaults_to_10_when_invalid_value_is_provided()
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers?limit=HELLOWORLD');

        $response
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('meta.total', 5)
            ->assertJsonPath('meta.per_page', 10);
    }

    public function test_users_can_pick_which_page_of_the_customers_list_to_display()
    {
        $user = User::factory()->create();
        Customer::factory()->count(11)->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers?page=2');

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('meta.total', 11)
            ->assertJsonPath('meta.per_page', 10);
    }

    public function test_users_can_search()
    {
        $user = User::factory()->create();
        $customers = Customer::factory()->count(10)->create();
        $customer = $customers->first();
        $names = explode(' ', $customer->name);
        Sanctum::actingAs($user);
        $response = $this->getJson("/api/customers?search={$names[1]}");
        $response->assertOk();
        $this->assertGreaterThanOrEqual(1, count($response['data']));
    }

    public function test_users_can_check_ic()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $customers = Customer::factory()->count(10)->create();
        $customer = $customers->first();
        Sanctum::actingAs($user);
        $response = $this->getJson('/api/customers/search?ic_number=89522452&ic_type_id=1');
        $response->assertOk();
    }

    public function test_users_can_soft_delete_customers()
    {
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $id = $customer->id;
        $this->assertFalse($customer->fresh()->trashed());

        Sanctum::actingAs($user);
        $this->deleteJson("/api/customers/{$customer->id}")
            ->assertOk()
            ->assertJsonPath('id', $id);
        $this->assertTrue($customer->fresh()->trashed());
    }

    public function test_users_can_update_existing_customer()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'ic_expiry_date' => date('Y-m-d', strtotime('+5 year')),
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => date('Y-m-d', strtotime('-12 year')),
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);

        $response->assertCreated();

        $this->assertDatabaseCount('customer', 1);
        $this->assertDatabaseCount('customer_address', 1);
        $this->assertDatabaseCount('address', 1);

        $customer = Customer::first();
        $customer_address = CustomerAddress::first();
        $old_address = Address::first();
        Mukim::factory()->count(5)->create();
        Village::factory()->count(5)->create();
        District::factory()->count(5)->create();
        PostalCode::factory()->count(5)->create();

        $old_customer_id = $customer->id;
        $old_address_id = $customer_address->address_id;
        $new_customer_name = 'Hello';
        $new_customer_email = 'a@gmail.com';
        $new_customer_mobile_number = '8953076';
        $new_customer_ic_number = '01001234';
        $new_customer_ic_type_id = 1;
        $new_customer_ic_color_id = 1;
        $new_customer_ic_expiry_date = now()->addYears(2);
        $new_customer_country_id = 1;
        $new_customer_title_id = 1;
        $new_customer_account_category_id = 1;
        $new_customer_birth_date = now()->subYears(12)->format('d-M-Y');
        $new_customer_village_id = 1;
        $new_customer_mukim_id = 2;
        $new_customer_district_id = 1;
        $new_customer_postal_code_id = 1;
        $new_customer_house_number = 'No 10';
        $new_customer_simpang = 'Simpang 99';
        $new_customer_street = 'Jalan Pasir Berakas';
        $new_customer_building_name = 'At Taqwa';
        $new_customer_block = 'Block C';
        $new_customer_floor = '2nd Floor';
        $new_customer_unit = 'Unit 2A';
        $new_customer_address_type_id = 1;

        $update_response = $this->putJson('/api/customers/update',
            [
                'id' => $old_customer_id,
                'name' => $new_customer_name,
                'email' => $new_customer_email,
                'mobile_number' => $new_customer_mobile_number,
                'ic_number' => $new_customer_ic_number,
                'ic_type_id' => $new_customer_ic_type_id,
                'ic_color_id' => $new_customer_ic_color_id,
                'ic_expiry_date' => $new_customer_ic_expiry_date,
                'country_id' => $new_customer_country_id,
                'customer_title_id' => $new_customer_title_id,
                'account_category_id' => $new_customer_account_category_id,
                'birth_date' => $new_customer_birth_date,
                'village_id' => $new_customer_village_id,
                'district_id' => $new_customer_district_id,
                'mukim_id' => $new_customer_mukim_id,
                'postal_code_id' => $new_customer_postal_code_id,
                'house_number' => $new_customer_house_number,
                'simpang' => $new_customer_simpang,
                'street' => $new_customer_street,
                'building_name' => $new_customer_building_name,
                'block' => $new_customer_block,
                'floor' => $new_customer_floor,
                'unit' => $new_customer_unit,
                'address_id' => $old_address_id,
            ]);

        $new_address = CustomerAddress::with('address')
            ->where('customer_id', $old_customer_id)
            ->first();

        $update_response->assertStatus(201);

        $new_customer = Customer::find($old_customer_id);
        // dd($new_customer);
        $this->assertEquals($new_customer->name, $new_customer_name);
        $this->assertEquals($new_customer->email, $new_customer_email);
        $this->assertEquals($new_customer->mobile_number, $new_customer_mobile_number);
        $this->assertEquals($new_customer->ic_number, $new_customer_ic_number);
        $this->assertEquals($new_customer->ic_type_id, $new_customer_ic_type_id);
        $this->assertEquals($new_customer->ic_color_id, $new_customer_ic_color_id);

        $this->assertEquals(date('d-M-Y', strtotime($new_customer->ic_expiry_date)),
            $new_customer_ic_expiry_date->format('d-M-Y'));
        $this->assertEquals($new_customer->country_id, $new_customer_country_id);
        $this->assertEquals($new_customer->customer_title_id, $new_customer_title_id);
        $this->assertEquals($new_customer->account_category_id, $new_customer_account_category_id);
        $this->assertEquals(date('d-M-Y', strtotime($new_customer->birth_date)),
            $new_customer_birth_date);
        $this->assertEquals($new_address->address->village_id, $new_customer_village_id);
        $this->assertEquals($new_address->address->district_id, $new_customer_district_id);
        $this->assertEquals($new_address->address->mukim_id, $new_customer_mukim_id);
        $this->assertEquals($new_address->address->postal_code_id, $new_customer_postal_code_id);
        $this->assertEquals($new_address->address->house_number, $new_customer_house_number);
        $this->assertEquals($new_address->address->simpang, $new_customer_simpang);
        $this->assertEquals($new_address->address->street, $new_customer_street);
        $this->assertEquals($new_address->address->building_name, $new_customer_building_name);
        $this->assertEquals($new_address->address->block, $new_customer_block);
        $this->assertEquals($new_address->address->floor, $new_customer_floor);
        $this->assertEquals($new_address->address->unit, $new_customer_unit);
    }

    public function test_users_cannot_create_new_customer_with_invalid_ic_expiry_date()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
        ] = $this->generateCustomerPostData();

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/customers', [
            'name' => $customer_name,
            'email' => $customer_email,
            'mobile_number' => $customer_mobile_number,
            'ic_number' => $customer_ic_number,
            'ic_type_id' => $customer_ic_type_id,
            'ic_color_id' => $customer_ic_color_id,
            'ic_expiry_date' => '2010-01-01',
            'country_id' => $customer_country_id,
            'customer_title_id' => $customer_title_id,
            'account_category_id' => $customer_account_category_id,
            'birth_date' => $customer_birth_date,
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);
        $response->assertStatus(422);
    }

    public function test_users_cannot_update_existing_customer_with_invalid_ic_expiry_date()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);

        $response->assertCreated();

        $this->assertDatabaseCount('customer', 1);
        $this->assertDatabaseCount('customer_address', 1);

        $customer = Customer::first();
        $customer_address = CustomerAddress::first();
        $old_address = Address::first();
        Mukim::factory()->count(5)->create();
        Village::factory()->count(5)->create();
        District::factory()->count(5)->create();
        PostalCode::factory()->count(5)->create();

        $old_customer_id = $customer->id;
        $old_address_id = $customer_address->address_id;
        $new_customer_name = 'Hello';
        $new_customer_email = 'a@gmail.com';
        $new_customer_mobile_number = '8953076';
        $new_customer_ic_number = '01001234';
        $new_customer_ic_type_id = 1;
        $new_customer_ic_color_id = 1;

        $new_customer_country_id = 1;
        $new_customer_title_id = 1;
        $new_customer_account_category_id = 1;
        $new_customer_birth_date = now()->addYears(3);
        $new_customer_village_id = 1;
        $new_customer_mukim_id = 2;
        $new_customer_district_id = 1;
        $new_customer_postal_code_id = 1;
        $new_customer_house_number = 'No 10';
        $new_customer_simpang = 'Simpang 99';
        $new_customer_street = 'Jalan Pasir Berakas';
        $new_customer_building_name = 'At Taqwa';
        $new_customer_block = 'Block C';
        $new_customer_floor = '2nd Floor';
        $new_customer_unit = 'Unit 2A';
        $new_customer_address_type_id = 1;

        $update_response = $this->putJson('/api/customers/update',
            [
                'id' => $old_customer_id,
                'name' => $new_customer_name,
                'email' => $new_customer_email,
                'mobile_number' => $new_customer_mobile_number,
                'ic_number' => $new_customer_ic_number,
                'ic_type_id' => $new_customer_ic_type_id,
                'ic_color_id' => $new_customer_ic_color_id,
                'ic_expiry_date' => '2010-01-01',
                'country_id' => $new_customer_country_id,
                'customer_title_id' => $new_customer_title_id,
                'account_category_id' => $new_customer_account_category_id,
                'birth_date' => $new_customer_birth_date,
                'village_id' => $new_customer_village_id,
                'district_id' => $new_customer_district_id,
                'mukim_id' => $new_customer_mukim_id,
                'postal_code_id' => $new_customer_postal_code_id,
                'house_number' => $new_customer_house_number,
                'simpang' => $new_customer_simpang,
                'street' => $new_customer_street,
                'building_name' => $new_customer_building_name,
                'block' => $new_customer_block,
                'floor' => $new_customer_floor,
                'unit' => $new_customer_unit,
                'address_id' => $old_address_id,
            ]);
        $update_response->assertStatus(422);
    }

    public function test_users_can_create_new_customer_with_correct_birthdate()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'birth_date' => date('Y-m-d', strtotime('-12 year')),
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);
        $response->assertCreated();
        $this->assertDatabaseCount('customer', 1);
    }

    public function test_users_cannot_create_new_customer_with_wrong_birthdate()
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
            $customer_village,
            $village,
            $customer_mukim_id,
            $customer_district_id,
            $customer_postal_code_id,
            $customer_house_number,
            $customer_simpang,
            $customer_street,
            $customer_building_name,
            $customer_block,
            $customer_floor,
            $customer_unit,
            $address_type_id,
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
            'birth_date' => date('Y-m-d', strtotime('-1 year')),
            'village_id' => $customer_village,
            'district_id' => $customer_district_id,
            'mukim_id' => $customer_mukim_id,
            'postal_code_id' => $customer_postal_code_id,
            'house_number' => $customer_house_number,
            'simpang' => $customer_simpang,
            'street' => $customer_street,
            'building_name' => $customer_building_name,
            'block' => $customer_block,
            'floor' => $customer_floor,
            'unit' => $customer_unit,
            'address_type_id' => $address_type_id,
        ]);
        $response->assertStatus(422);
    }
}
