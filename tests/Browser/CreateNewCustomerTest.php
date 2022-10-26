<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNewCustomerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    public function test_can_create_new_customer()
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
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('CREATE')
                ->type('#name', 'Lorem')
                ->type('#icNumber', '01123456')
                ->select('#icTypeId', '1')
                ->keys('#icExpiryDate', $today->day)
                ->keys('#icExpiryDate', $today->month)
                ->keys('#icExpiryDate', $today->year)
                ->select('#countryId', '1')
                ->select('#accountCategoryId', '1')
                ->keys('#birthDate', $today->day)
                ->keys('#birthDate', $today->month)
                ->keys('#birthDate', $today->year)
                ->press('CREATE')
                ->waitForText('Customer')
                ->assertPathIs('/customers/1');
        });
    }
}
