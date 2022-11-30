<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class SearchCustomerTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $customer = \App\Models\Customer::first();

            $browser->visit(env('FRONTEND_URL').'/customers')
                ->typeSlowly('#search', $customer->email)
                ->press('Search')
                ->waitForText($customer->name);
            // advance search functionality
            $browser->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->check('advanced')
                ->type('#custEmail', $customer->email)
                ->press('Search')
                ->waitForText($customer->name)
                ->type('#custIc', '111111')
                ->press('Search')
                ->waitUntilMissingText($customer->name)
                ->type('#custIc', $customer->ic_number)
                ->press('Search')
                ->waitForText($customer->name)
                ->type('#custName', 'xxxx')
                ->press('Search')
                ->waitUntilMissingText($customer->name)
                ->type('#custName', $customer->name)
                ->press('Search')
                ->waitForText($customer->name);
        });
    }
}
