<?php

namespace Tests;

use Laravel\Dusk\Browser;

class CustomDuskTestCase extends DuskTestCase
{
    public function loginAsAdmin(Browser $browser): void
    {
        $browser
            ->visit(env('FRONTEND_URL').'/login')
            ->waitForText('Email')
            ->waitForText('Remember me')
            ->type('#email', env('ADMIN_EMAIL'))
            ->type('#password', env('ADMIN_PASSWORD'))
            ->press('LOGIN')
            ->waitForText('Dashboard')
            ->assertPathIs('/dashboard');
    }

    public function createNewCustomer(Browser $browser): void
    {
        $today = now();

        $browser
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
            ->attach('#icFront', base_path('tests/Browser/photos/600x300.png'))
            ->attach('#icBack', base_path('tests/Browser/photos/600x300.png'))
            ->press('CREATE')
            ->waitForText('Customer with')
            ->assertPathIs('/customers/*');
    }

    public function changeCustomersListDropdownSort(Browser $browser, $sort = 'asc'): void
    {
        $browser
            ->select('#sort', $sort)
            ->waitForText('Customers Index');
        sleep(1);
    }

    public function changeCustomersListDropdownLimit(Browser $browser, $limit = 10): void
    {
        $browser
            ->select('#limit', $limit)
            ->waitForText('Customers Index');
        sleep(1);
    }

    public function checkCustomerIcExist(Browser $browser): void
    {
        $browser
        ->visit(env('FRONTEND_URL').'/customers/create')
        ->waitForText('CREATE')
        ->type('#name', 'Lorem')
        ->type('#icNumber', '98909584')
        ->select('#icTypeId', '1')
        ->waitForText('Customer Already Exist');
    }
}
