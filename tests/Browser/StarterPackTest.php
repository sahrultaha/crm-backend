<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class StarterPackTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $pack = \App\Models\Pack::orderBy('id', 'desc')->first();

            $browser->visit(env('FRONTEND_URL').'/starter-packs')
                ->waitForText($pack->number->number);
        });
    }
}
