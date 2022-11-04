<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CreateNewCustomerTest extends CustomDuskTestCase
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

    public function test_can_create_new_customer()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
        });
    }
}
