<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class LoginTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('FRONTEND_URL').'/login')
                ->waitForText('Email')
                ->waitForText('Remember me')
                ->typeSlowly('#email', env('ADMIN_EMAIL'))
                ->typeSlowly('#password', env('ADMIN_PASSWORD'))
                ->press('LOGIN')
                ->waitForText('Dashboard')
                ->assertPathIs('/dashboard');
        });
    }
}
