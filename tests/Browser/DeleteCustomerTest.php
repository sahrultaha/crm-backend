<?php

namespace Tests\Browser;

use App\Models\Customer;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class DeleteCustomerTest extends CustomDuskTestCase
{
    public function test_can_delete_customer()
    {
        $this->browse(function (Browser $browser) {
            $ic_number = '01992233';

            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, $ic_number);
            $this->assertDatabaseCount('customer', 31);

            $customer = Customer::where('ic_number', $ic_number)->firstOrFail();

            $browser
            ->waitForText('DELETE')
            ->press('DELETE')
            ->waitForText('YES')
            ->press('YES')
            ->waitForText('Customers Index')
            ->assertPathIs('/customers');

            $this->assertSoftDeleted($customer);
        });
    }
}
