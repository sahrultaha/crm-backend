<?php

namespace Tests\Browser;

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
            $imsi_id = \App\Models\Imsi::count();

            $old_imsi_number = '1234567890';
            $new_imsi_number = '1234567891';

            $browser
                ->visit(env('FRONTEND_URL')."/imsi/$imsi_id/edit")
                ->waitForText('Update Imsi')
                ->waitForText('UPDATE')
                ->pause(1000)
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
                ->pause(1000)
                ->waitForText('Create')
                ->assertPathIs('/imsi');

            $browser
                ->visit(env('FRONTEND_URL')."/imsi/$imsi_id/edit")
                ->waitForText('Update Imsi')
                ->waitForText('UPDATE')
                ->pause(1000)
                ->assertValue('#imsi', $new_imsi_number)
                ->assertValue('#imsiStatusId', '1')
                ->assertValue('#imsiTypeId', '1')
                ->assertValue('#pin', '1234')
                ->assertValue('#puk1', '987654321')
                ->assertValue('#puk2', '987654322');
        });
    }

    public function createNewImsi(Browser $browser): void
    {
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
            ->pause(500)
            ->waitForText('Create')
            ->assertPathIs('/imsi');
    }
}
