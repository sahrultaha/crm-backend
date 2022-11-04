<?php

namespace Tests\Browser;

use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CheckCustomerIcTest extends CustomDuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    public function test_users_can_check_ic()
    {
        $this->assertDatabaseCount('customer', 30);
        $customer = Customer::find(1);
        $this->browse(function (Browser $browser) use ($customer) {
            $this->loginAsAdmin($browser);
            $browser
            ->visit(env('FRONTEND_URL').'/customers/create')
            ->waitForText('CREATE')
            ->type('#name', 'Lorem')
            ->typeSlowly('#icNumber', $customer->ic_number)
            ->select('#icTypeId', '1')
            ->pause(5000)
            ->waitForText('Customer already exist!');
        });
    }
}
