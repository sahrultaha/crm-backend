<?php

namespace Tests\Browser;

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

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->assertSee('1 -')
                ->assertSee('2 -');

            $this->changeCustomersListDropdownSort($browser, 'desc');

            $browser
                ->assertSee('2 -')
                ->assertSee('1 -');

            $this->changeCustomersListDropdownSort($browser, 'asc');

            $browser
                ->assertSee('1 -')
                ->assertSee('2 -');

            $this->changeCustomersListDropdownLimit($browser, 1);

            $browser
                ->assertSee('1 -')
                ->assertNotPresent('2 -');
        });
    }
}
