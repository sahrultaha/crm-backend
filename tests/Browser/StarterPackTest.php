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

    public function test_upload()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit(env('FRONTEND_URL').'/starter-packs/upload')
                ->attach('fileUpload', base_path('tests/Browser/photos/600x300.png'))
                ->press('SUBMIT')
                ->waitForText('Invalid');

            $browser->visit(env('FRONTEND_URL').'/starter-packs/upload')
                ->attach('fileUpload', base_path('tests/Browser/files/csv/starter-pack.csv'))
                ->press('SUBMIT')
                ->waitForText('Successfully upload');
        });
    }
}
