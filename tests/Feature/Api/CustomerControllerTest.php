<?php

namespace Tests\Feature\Api;

use App\Models\AccountCategory;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerTitle;
use App\Models\File;
use App\Models\FileCategory;
use App\Models\FileRelationType;
use App\Models\IcColor;
use App\Models\IcType;
use App\Models\User;
use Database\Seeders\FileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    public function test_users_can_view_customer_details()
    {
        Storage::fake('s3');
        $this->seed(FileSeeder::class);
        $user = User::factory()->create();
        $ic_front_category = FileCategory::find(1);
        $ic_back_category = FileCategory::find(2);
        $fake_file = UploadedFile::fake()->image('image.jpg');

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
}
