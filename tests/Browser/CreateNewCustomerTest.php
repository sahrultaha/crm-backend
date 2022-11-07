<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CreateNewCustomerTest extends CustomDuskTestCase
{
    public function test_can_create_new_customer()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
        });
    }

    public function test_name_can_be_separated_by_space()
    {
        $this->browse(function (Browser $browser) {
            $name = 'Lorem Ipsum';
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('CREATE')
                ->typeSlowly('#name', $name);

            $value = $browser->value('#name');
            $this->assertEquals($name, $value);
        });
    }
}
