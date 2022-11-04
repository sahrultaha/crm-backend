<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchCustomerTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
        });
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

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
                ->typeSlowly('#email', env('ADMIN_EMAIL'))
                ->typeSlowly('#password', env('ADMIN_PASSWORD'))
                ->press('LOGIN')
                ->waitForText('Dashboard')
                ->assertPathIs('/dashboard');
            $browser->visit(env('FRONTEND_URL').'/customers')
                ->waitForText('Customers Index')
                ->typeSlowly('#search', $customer->email)
                ->press('Search')
                ->waitForText($customer->name);
        });
    }
}
