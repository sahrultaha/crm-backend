<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CreateNewCustomerTest extends CustomDuskTestCase
{
    use DatabaseMigrations;

    public $seed = true;

    public function test_can_create_new_customer()
    {
        $today = now();
        $this->browse(function (Browser $browser) use ($today) {
            // $this->createNewCustomer($browser, '00999999');
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
                ->type('#icNumber', '77661234')
                ->select('#icTypeId', '1')
                ->keys('#icExpiryDate', $today->day)
                ->keys('#icExpiryDate', $today->month)
                ->keys('#icExpiryDate', $today->year)
                ->select('#countryId', '1')
                ->select('#accountCategoryId', '1')
                ->keys('#birthDate', $today->day)
                ->keys('#birthDate', $today->month)
                ->keys('#birthDate', $today->year)
                ->attach('#icFront', base_path('tests/Browser/photos/600x300.png'))
                ->attach('#icBack', base_path('tests/Browser/photos/600x300.png'))
                ->press('CREATE')
                ->waitForText('Customer with')
                ->assertPathIs('/customers/*');
        });
    }
}
