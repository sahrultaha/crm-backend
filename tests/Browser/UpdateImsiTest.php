<?php

namespace Tests\Browser;

use App\Models\Imsi;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class UpdateImsiTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_can_update_existing_imsi(): void
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewImsi($browser);
            $this->assertDatabaseCount('imsi', 1);
            $imsi_id = Imsi::first()->id;

            $old_imsi_number = '1234567890';
            $new_imsi_number = '1234567891';

            $browser
                ->visit(env('FRONTEND_URL')."/imsi/$imsi_id/edit")
                ->waitForText('Update Imsi')
                ->waitForText('UPDATE')
                ->assertValue('#imsi', $old_imsi_number)
                ->assertValue('#imsiStatusId', '1')
                ->assertValue('#imsiTypeId', '1')
                ->assertValue('#pin', '1234')
                ->assertValue('#puk1', '987654321')
                ->assertValue('#puk2', '987654322');

            $browser
                ->type('#imsi', '')
                ->typeSlowly('#imsi', $new_imsi_number)
                ->press('UPDATE')
                ->waitForText('Create New IMSI')
                ->assertPathIs('/imsi');

            $browser
                ->visit(env('FRONTEND_URL')."/imsi/$imsi_id/edit")
                ->waitForText('Update Imsi')
                ->waitForText('UPDATE')
                ->assertValue('#imsi', $new_imsi_number)
                ->assertValue('#imsiStatusId', '1')
                ->assertValue('#imsiTypeId', '1')
                ->assertValue('#pin', '1234')
                ->assertValue('#puk1', '987654321')
                ->assertValue('#puk2', '987654322');
        });
    }
}
