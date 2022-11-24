<?php

namespace Tests\Browser;

use App\Models\Customer;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class UpdateCustomerTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_can_update_existing_customer(): void
    {
        $this->browse(function (Browser $browser) {
            $today = now()->addYears(7);
            $birthday = now()->subYears(12);
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
            $customer = Customer::find(1);
            $browser
            ->waitForText('EDIT')
            ->press('EDIT');
            $new_customer_name = 'Hello';
            $new_customer_email = 'a@gmail.com';
            $new_customer_mobile_number = '8953076';
            $new_customer_ic_number = '01001234';
            $new_customer_house_number = 'No 10';
            $new_customer_simpang = 'Simpang 99';
            $new_customer_street = 'Jalan Pasir Berakas';
            $new_customer_building_name = 'At Taqwa';
            $new_customer_block = 'Block D';
            $new_customer_floor = '3rd Floor';
            $new_customer_unit = 'Unit 25Z';

            $browser
            ->pause(1000)
            ->waitForText('SAVE CHANGES')
            ->clear('#name')
                ->typeSlowly('#name', $new_customer_name)
                ->typeSlowly('#icNumber', $new_customer_ic_number)
                ->select('#icTypeId', '1')
                ->keys('#icExpiryDate', $today->day)
                ->keys('#icExpiryDate', $today->month)
                ->keys('#icExpiryDate', $today->year)
                ->select('#countryId', '2')
                ->select('#accountCategoryId', '2')
                ->keys('#birthDate', $birthday->day)
                ->keys('#birthDate', $birthday->month)
                ->keys('#birthDate', $birthday->year)
                ->keys('#house_number', $new_customer_house_number)
                ->keys('#street', $new_customer_street)
                ->keys('#building_name', $new_customer_building_name)
                ->keys('#block', $new_customer_block)
                ->keys('#floor', $new_customer_floor)
                ->keys('#unit', $new_customer_unit)
                ->attach('#icFront', base_path('tests/Browser/photos/600x300.png'))
                ->attach('#icBack', base_path('tests/Browser/photos/600x300.png'))
                ->press('SAVE CHANGES')
                ->assertDialogOpened('Are you sure to update customer?')
                ->pause(1000)
                ->acceptDialog()
                ->waitForText('Customer with')
                ->assertPathIs('/customers/*');
            //check the value is changed

            $browser
            ->press('EDIT')
            ->pause(1000)
            ->waitForText('SAVE CHANGES')
            ->assertValue('#name', $new_customer_name)
            ->assertValue('#icNumber', $new_customer_ic_number)
            ->assertValue('#icTypeId', '1')
            ->assertValue('#countryId', '2')
            ->assertValue('#accountCategoryId', '2')
            ->assertValue('#house_number', $new_customer_house_number)
            ->assertValue('#street', $new_customer_street)
            ->assertValue('#building_name', $new_customer_building_name)
            ->assertValue('#block', $new_customer_block)
            ->assertValue('#floor', $new_customer_floor)
            ->assertValue('#unit', $new_customer_unit);
        });
    }

    public function test_update_not_proceed_when_cancel(): void
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
            $browser
            ->waitForText('EDIT')
            ->press('EDIT')
            ->pause(1000)
            ->waitForText('Update Customer Details')
            ->waitForText('SAVE CHANGES')
            ->press('SAVE CHANGES')
            ->assertDialogOpened('Are you sure to update customer?')
            ->pause(1000)
            ->dismissDialog();
        });
    }

    public function test_user_cannot_update_customer_to_existing_ic(): void
    {
        $this->browse(function (Browser $browser) {
            $customer1_ic = '77661234';
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
            $this->createNewCustomer($browser, '09123241');
            $browser
            ->pause(1000)
            ->waitForText('EDIT')
            ->press('EDIT')
            ->waitForText('Update Customer Details')
            ->pause(1000)
            ->clear('#icNumber')
            ->typeSlowly('#icNumber', $customer1_ic)
            ->select('#icTypeId', '1')
            ->waitForText('Customer already exist!');
        });
    }

    public function test_user_cannot_update_when_enter_birthdate_12_years_below(): void
    {
        $this->browse(function (Browser $browser) {
            $new_expiry_date = now();
            $customer1_ic = '77661234';
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '77661234');
            $this->createNewCustomer($browser, '09123241');
            $browser
            ->pause(1000)
            ->waitForText('EDIT')
            ->press('EDIT')
            ->waitForText('Update Customer Details')
            ->pause(1000)
            ->keys('#birthDate', $new_expiry_date->day)
            ->keys('#birthDate', $new_expiry_date->month)
            ->keys('#birthDate', $new_expiry_date->year)
            ->waitForDialog(1)
            // >assertSee("Age must be 12 years old and above");
            ->assertDialogOpened('Age must be 12 years old and above');
        });
    }
}
