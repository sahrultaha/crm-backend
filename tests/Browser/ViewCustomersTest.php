<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriverBy;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class ViewCustomersTest extends CustomDuskTestCase
{
    public function test_can_view_customers()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '00000004');

            $browser->pause(1000);

            $elements = $browser->driver->findElements(WebDriverBy::tagName('img'));
            $this->assertCount(2, $elements);
        });
    }
}
