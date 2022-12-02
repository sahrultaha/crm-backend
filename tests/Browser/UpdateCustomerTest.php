<?php

namespace Tests\Browser;

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
            $expiry_date = now()->addYears(7);
            $new_birthday = now()->subYears(21);
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '00000001');
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
                ->keys('#icExpiryDate', $expiry_date->format('d'))
                ->keys('#icExpiryDate', $expiry_date->format('m'))
                ->keys('#icExpiryDate', $expiry_date->format('Y'))
                ->select('#countryId', '2')
                ->select('#accountCategoryId', '2')
                ->keys('#birthDate', $new_birthday->format('d'))
                ->keys('#birthDate', $new_birthday->format('m'))
                ->keys('#birthDate', $new_birthday->format('Y'))
                ->typeSlowly('#house_number', $new_customer_house_number)
                ->typeSlowly('#street', $new_customer_street)
                ->typeSlowly('#building_name', $new_customer_building_name)
                ->typeSlowly('#block', $new_customer_block)
                ->typeSlowly('#floor', $new_customer_floor)
                ->typeSlowly('#unit', $new_customer_unit)
                ->attach('#icFront', base_path('tests/Browser/photos/600x300.png'))
                ->attach('#icBack', base_path('tests/Browser/photos/600x300.png'))
                ->pause(1000)
                ->press('SAVE CHANGES')
                ->assertDialogOpened('Are you sure to update customer?')
                ->acceptDialog()
                ->waitForText('Customer with')
                ->assertPathIs('/customers/*');
            //check the value is changed

            $browser
                ->press('EDIT')
                ->waitForText('SAVE CHANGES')
                ->pause(2000)
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
            $this->createNewCustomer($browser, '00000001');
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
            $customer1_ic = '00000001';
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, $customer1_ic);
            $this->createNewCustomer($browser, '00123241');
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
            $birthday = now();
            $day = date('d');
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, '30123241');
            $browser
                ->pause(1000)
                ->waitForText('EDIT')
                ->press('EDIT')
                ->waitForText('Update Customer Details')
                ->pause(1000)
                ->keys('#birthDate', $birthday->format('d'))
                ->keys('#birthDate', $birthday->format('m'))
                ->keys('#birthDate', $birthday->format('Y'))
                ->assertDialogOpened('Age must be 12 years old and above');
        });
    }
}
