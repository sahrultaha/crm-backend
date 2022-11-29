<?php

namespace Tests;

use Illuminate\Support\Carbon;
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
            ->type('#email', env('ADMIN_EMAIL'))
            ->type('#password', env('ADMIN_PASSWORD'))
            ->press('LOGIN')
            ->pause(500)
            ->waitForText('Customers Index')
            ->assertPathIsNot('/login');
    }

    public function createNewCustomer(Browser $browser, $ic_number = '01987651'): void
    {
        $today = now()->subYears(13);
        $ic_expiry_date = now()->addYears(5);

        $browser
            ->visit(env('FRONTEND_URL').'/customers/create')
            ->waitForText('Please enter ic details.')
            ->typeSlowly('#icNumber', $ic_number)
            ->select('#icTypeId', '1')
            ->select('#icColorId', '1');

        $this->setAntDesignDatePicker($browser, '#icExpiryDate', $ic_expiry_date);

        $browser
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

    public function setAntDesignDatePicker(Browser $browser, string $selector, Carbon $date): void
    {
        $year_month_day_string = $date->year.'-'.$date->month.'-'.$date->day;
        $pause_value_in_ms = 100;

        $browser
            ->click($selector)
            ->pause($pause_value_in_ms)
            ->click('.ant-picker-year-btn')
            ->pause($pause_value_in_ms)
            ->click('.ant-picker-cell-in-view[title="'.$date->year.'"]')
            ->pause($pause_value_in_ms)
            ->click('.ant-picker-month-btn')
            ->pause($pause_value_in_ms)
            ->click('.ant-picker-cell-in-view[title="'.$date->year.'-'.$date->month.'"]')
            ->pause($pause_value_in_ms)
            ->click('.ant-picker-cell-in-view[title="'.$year_month_day_string.'"]');
    }

    public function setAntDesignSelect(Browser $browser, string $selector, string $option_title)
    {
        $browser
            ->click($selector.' .ant-select-selector')
            ->pause(100)
            ->click('.ant-select-item-option[title="'.$option_title.'"]');
    }
}
