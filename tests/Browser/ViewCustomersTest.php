<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewCustomersTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    public function test_can_view_customers()
    {
        $today = now();
        $this->browse(function (Browser $browser) use ($today) {
            $browser
                ->visit(env('FRONTEND_URL').'/login')
                ->waitForText('Email')
                ->waitForText('Remember me')
                ->type('#email', env('ADMIN_EMAIL'))
                ->type('#password', env('ADMIN_PASSWORD'))
                ->press('LOGIN')
                ->waitForText('Dashboard')
                ->assertPathIs('/dashboard')
                ->visit(env('FRONTEND_URL').'/customers/1')
                ->waitForText('Customer')
                ->assertPathIs('/customers/1');
        });
    }
}
