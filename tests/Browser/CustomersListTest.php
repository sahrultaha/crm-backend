<?php

namespace Tests\Browser;

use App\Models\Customer;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CustomersListTest extends CustomDuskTestCase
{
    public function test_can_view_list_of_customers()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            \Illuminate\Support\Facades\DB::statement('delete from customer');

            $this->createNewCustomer($browser, '00000001');
            $this->createNewCustomer($browser, '00000003');

            $this->assertDatabaseCount('customer', 2);
            $customers = Customer::all()->toArray();
            $customerA = $customers[0];
            $customerB = $customers[1];

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index');

            sleep(1);

            $browser
                ->assertSee($customerA['name'])
                ->assertSee($customerB['name']);

            $this->changeCustomersListDropdownSort($browser, 'desc');

            $browser
                ->assertSee($customerB['name'])
                ->assertSee($customerA['name']);

            $this->changeCustomersListDropdownSort($browser, 'asc');

            $browser
                ->assertSee($customerA['name'])
                ->assertSee($customerB['name']);

            $this->changeCustomersListDropdownLimit($browser, 1);

            $browser
                ->assertSee($customerA['name'])
                ->assertNotPresent($customerB['name'])
                ->assertPresent('#page-link-1')
                ->assertPresent('#page-link-2');

            $browser
                ->click('#page-link-2')
                ->pause(1000)
                ->assertSee($customerB['name'])
                ->assertNotPresent($customerA['name']);
        });
    }
}
