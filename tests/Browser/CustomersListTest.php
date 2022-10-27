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
            $browser = $this->loginAsAdmin($browser);

            $browser = $this->createNewCustomer($browser);
            $browser = $this->createNewCustomer($browser);

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->assertSee('1 -')
                ->assertSee('2 -');

            $browser = $this->changeCustomersListDropdownSort($browser, 'desc');

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->assertSee('2 -')
                ->assertSee('1 -');

            $browser = $this->changeCustomersListDropdownLimit($browser, 1);

            $browser
                ->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->assertSee('1 -')
                ->assertNotPresent('2 -');
        });
    }
}
