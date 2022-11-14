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
            $this->assertDatabaseCount('imsi', 0);
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/imsi/create')
                ->waitForText('Create Imsi')
                ->waitForText('CREATE')
                ->typeSlowly('#imsi', '1234567890')
                ->select('#imsiStatusId', '1')
                ->select('#imsiTypeId', '1')
                ->typeSlowly('#pin', '1234')
                ->typeSlowly('#puk1', '987654321')
                ->typeSlowly('#puk2', '987654322')
                ->press('CREATE')
                ->waitForText('Create New IMSI')
                ->assertPathIs('/imsi');
            $this->assertDatabaseCount('imsi', 1);
        });
    }
}
