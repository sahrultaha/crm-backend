<?php

namespace Tests\Browser;

use App\Models\Customer;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CheckCustomerIcTest extends CustomDuskTestCase
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

    public function test_users_can_check_ic()
    {
        $this->assertDatabaseCount('customer', 30);
        $customer = Customer::find(1);
        $this->browse(function (Browser $browser) use ($customer) {
            $this->loginAsAdmin($browser);
            $browser
            ->visit(env('FRONTEND_URL').'/customers/create')
            ->waitForText('CREATE')
            ->typeSlowly('#name', 'Lorem')
            ->typeSlowly('#icNumber', $customer->ic_number)
            ->select('#icTypeId', '1')
            ->pause(5000)
            ->waitForText('Customer already exist!');
        });
    }
}
