<?php

namespace Tests\Browser;

use App\Models\Customer;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CheckCustomerIcTest extends CustomDuskTestCase
{
    public function test_users_can_check_ic()
    {
        $this->assertDatabaseCount('customer', 30);

        $customer = Customer::find(1);
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
            $today = now()->addYears(5);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.')
                ->typeSlowly('#icNumber', '77661234')
                ->select('#icTypeId', '1')
                ->select('#icColorId', '1')
                ->keys('#icExpiryDate', $today->day)
                ->keys('#icExpiryDate', $today->month)
                ->keys('#icExpiryDate', $today->year)
                ->waitForText('Customer already exist!');
        });
    }
}
