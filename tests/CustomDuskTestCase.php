<?php

namespace Tests;

use Laravel\Dusk\Browser;

class CustomDuskTestCase extends DuskTestCase
{
    public function loginAsAdmin(Browser $browser): Browser
    {
        return $browser
            ->visit(env('FRONTEND_URL').'/login')
            ->waitForText('Email')
            ->waitForText('Remember me')
            ->type('#email', env('ADMIN_EMAIL'))
            ->type('#password', env('ADMIN_PASSWORD'))
            ->press('LOGIN')
            ->waitForText('Dashboard')
            ->assertPathIs('/dashboard');
    }

    public function createNewCustomer(Browser $browser): Browser
    {
        $today = now();

        return $browser
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
            ->waitForText('Customer');
    }

    public function changeCustomersListDropdownSort(Browser $browser, $sort = 'asc'): Browser
    {
        return $browser
            ->visit(env('FRONTEND_URL').'/customers')
            ->waitForText('Customers Index')
            ->select('#sort', $sort)
            ->waitForText('Customers Index');
    }

    public function changeCustomersListDropdownLimit(Browser $browser, $limit = 10): Browser
    {
        return $browser
            ->visit(env('FRONTEND_URL').'/customers')
            ->waitForText('Customers Index')
            ->select('#limit', $limit)
            ->waitForText('Customers Index');
    }
}
