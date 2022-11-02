<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class ViewCustomersTest extends CustomDuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    public function test_can_view_customers()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser);

            sleep(1);

            $elements = $browser->driver->findElements(WebDriverBy::tagName('img'));
            $this->assertCount(2, $elements);
        });
    }
}
