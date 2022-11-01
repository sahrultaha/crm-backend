<?php

namespace Tests\Browser;

use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CustomersListTest extends CustomDuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    public function test_can_view_list_of_customers()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            \Illuminate\Support\Facades\DB::statement('delete from customer');

            $this->createNewCustomer($browser);
            $this->createNewCustomer($browser);

            $this->assertDatabaseCount('customer', 2);
            $customers = Customer::all()->toArray();
            $customerA = $customers[0];
            $customerB = $customers[1];

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index');

            sleep(1);

            $browser
                ->assertSee($customerA['id'].' - '.$customerA['name'])
                ->assertSee($customerB['id'].' - '.$customerB['name']);

            $this->changeCustomersListDropdownSort($browser, 'desc');

            $browser
                ->assertSee($customerB['id'].' - '.$customerB['name'])
                ->assertSee($customerA['id'].' - '.$customerA['name']);

            $this->changeCustomersListDropdownSort($browser, 'asc');

            $browser
                ->assertSee($customerA['id'].' - '.$customerA['name'])
                ->assertSee($customerB['id'].' - '.$customerB['name']);

            $this->changeCustomersListDropdownLimit($browser, 1);

            $browser
                ->assertSee($customerA['id'].' - '.$customerA['name'])
                ->assertNotPresent($customerB['id'].' - '.$customerB['name']);
        });
    }
}
