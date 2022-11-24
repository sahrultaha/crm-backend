<?php

namespace Tests;

use Laravel\Dusk\Browser;

class CustomDuskTestCase extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
        });
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function loginAsAdmin(Browser $browser): void
    {
        $browser->driver->manage()->deleteAllCookies();
        $browser
            ->visit(env('FRONTEND_URL').'/login')
            ->waitForText('Email')
            ->waitForText('Remember me')
            ->typeSlowly('#email', env('ADMIN_EMAIL'))
            ->typeSlowly('#password', env('ADMIN_PASSWORD'))
            ->press('LOGIN')
            ->waitForText('Customers Index')
            ->assertPathIs('/customers');
    }

    public function createNewCustomer(Browser $browser, $ic_number = '01987651'): void
    {
        $today = now();
        $new_expiry_date = now()->addYears(5);

        $browser
            ->visit(env('FRONTEND_URL').'/customers/create')
            ->waitForText('Please enter ic details.')
            ->typeSlowly('#icNumber', $ic_number)
            ->select('#icTypeId', '1')
            ->select('#icColorId', '1')
            ->keys('#icExpiryDate', $new_expiry_date->day)
            ->keys('#icExpiryDate', $new_expiry_date->month)
            ->keys('#icExpiryDate', $new_expiry_date->year)
            ->waitForText('CREATE')
            ->typeSlowly('#name', 'Lorem')
            ->select('#countryId', '1')
            ->select('#accountCategoryId', '1')
            ->keys('#birthDate', $today->day)
            ->keys('#birthDate', $today->month)
            ->keys('#birthDate', $today->year)
            ->attach('#icFront', base_path('tests/Browser/photos/600x300.png'))
            ->attach('#icBack', base_path('tests/Browser/photos/600x300.png'))
            ->press('CREATE')
            ->pause(2000)
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

    public function createNewImsi(Browser $browser): void
    {
        $browser
            ->visit(env('FRONTEND_URL').'/imsi/create')
            ->waitForText('Create Imsi')
            ->waitForText('CREATE')
            ->typeSlowly('#imsi', '1234567890')
            ->select('#imsiStatusId', '1')
            ->select('#imsiTypeId', '1')
            ->typeSlowly('#pin', '1234')
            ->typeSlowly('#puk1', '987654321')
            ->typeSlowly('#puk2', '987654322')
            ->press('CREATE')
            ->waitForText('Create New IMSI')
            ->assertPathIs('/imsi');
    }
}
