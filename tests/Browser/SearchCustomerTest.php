<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchCustomerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $this->browse(function (Browser $browser) {
            $customer = \App\Models\Customer::first();

            $browser->visit(env('FRONTEND_URL').'/login')
                ->waitForText('Email')
                ->waitForText('Remember me')
                ->type('#email', env('ADMIN_EMAIL'))
                ->type('#password', env('ADMIN_PASSWORD'))
                ->press('LOGIN')
                ->waitForText('Dashboard')
                ->assertPathIs('/dashboard');
            $browser->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->type('#search', $customer->email)
                ->press('Search')
                ->waitForText($customer->name);
        });
    }
}
