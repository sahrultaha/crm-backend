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
            \Illuminate\Support\Facades\DB::statement('delete from subscription_number');
            \Illuminate\Support\Facades\DB::statement('delete from subscription');
            \Illuminate\Support\Facades\DB::statement('delete from customer');

            // $customers = Customer::all()->toArray();
            $customerA = Customer::factory()->create();
            $customerB = Customer::factory()->create();

            $this->assertDatabaseCount('customer', 2);

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index');

            sleep(1);

            $browser
                ->assertSee($customerA->name)
                ->assertSee($customerB->name);

            $this->changeCustomersListDropdownSort($browser, 'desc');

            $browser
                ->assertSee($customerA->name)
                ->assertSee($customerB->name);

            $this->changeCustomersListDropdownSort($browser, 'asc');

            $browser
                ->assertSee($customerA->name)
                ->assertSee($customerB->name);

            $this->changeCustomersListDropdownLimit($browser, 1);

            $browser
                ->assertSee($customerA->name)
                ->assertNotPresent($customerB->name)
                ->assertPresent('#page-link-1')
                ->assertPresent('#page-link-2');

            $browser
                ->click('#page-link-2')
                ->pause(1000)
                ->assertSee($customerB->name)
                ->assertNotPresent($customerA->name);
        });
    }
}
