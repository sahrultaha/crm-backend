<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CreateNewImsiTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_can_create_new_imsi(): void
    {
        $this->browse(function (Browser $browser) {
            $this->assertDatabaseCount('imsi', 3);
            $this->loginAsAdmin($browser);
            $this->createNewImsi($browser);
            $this->assertDatabaseCount('imsi', 4);
        });
    }
}
