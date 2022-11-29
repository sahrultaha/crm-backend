<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CreateNewNumberTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_can_create_new_msisdn(): void
    {
        \Illuminate\Support\Facades\DB::statement('delete from pack');
        \Illuminate\Support\Facades\DB::statement('delete from subscription_number');
        \Illuminate\Support\Facades\DB::statement('delete from number');
        $this->assertDatabaseCount('number', 0);
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/msisdn/create')
                ->waitForText('Number')
                ->typeSlowly('#number', '8000003')
                ->select('#numberTypeId', '1')
                ->select('#numberStatusId', '2')
                ->select('#numberCategoryId', '1')
                ->waitForText('CREATE')
                ->press('CREATE')
                ->waitForText('MSISDN');
        });
        $this->assertDatabaseCount('number', 1);
    }
}
