<?php

namespace Tests\Browser;

use App\Models\Number;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class DeleteNumberTest extends CustomDuskTestCase
{
    public function test_can_delete_customer()
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

            $number = Number::where('number', 8000003)->firstOrFail();

            $browser
            ->waitForText('DELETE')
            ->press('DELETE')
            ->waitForDialog(10)
            ->acceptDialog()
            ->waitForText('MSISDN')
            ->assertPathIs('/msisdn');
            sleep(1);

            $this->assertSoftDeleted($number);
        });
        $this->assertDatabaseCount('number', 1);
    }
}
