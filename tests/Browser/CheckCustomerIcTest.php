<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CheckCustomerIcTest extends CustomDuskTestCase
{
    private function generateBackspaces($numberOfBackspaces = 8): array
    {
        $array = [];
        for ($i = 1; $i <= $numberOfBackspaces; $i++) {
            $array[] = '{backspace}';
        }

        return $array;
    }

    public function test_users_can_find_out_if_ic_already_exists()
    {
        $this->browse(function (Browser $browser) {
            $ic_number = '00000001';
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser, $ic_number);

            $date = now()->addYears(5);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.')
                ->typeSlowly('#icNumber', $ic_number);
            $this->setAntDesignSelect($browser, '#icTypeId', 'Personal');
            $this->setAntDesignSelect($browser, '#icColorId', 'Yellow');
            $this->setAntDesignDatePicker($browser, '#icExpiryDate', $date);
            $browser->assertPresent('#icTypeId .ant-select-selection-item[title="Personal"]');
            $browser->waitForText('Customer already exist!');
        });
    }

    public function test_ic_check_for_empty()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.');
            $this->setAntDesignSelect($browser, '#icTypeId', 'Personal');
            $this->setAntDesignSelect($browser, '#icColorId', 'Yellow');
            $this->setAntDesignDatePicker($browser, '#icExpiryDate', now()->addYears(5));
            $browser->typeSlowly('#icNumber', '00000002')
                ->keys('#icNumber', ...$this->generateBackspaces())
                ->waitForText('IC cannot be empty!');
        });
    }

    public function test_ic_check_for_starts_with()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.');
            $this->setAntDesignSelect($browser, '#icTypeId', 'Personal');
            $this->setAntDesignSelect($browser, '#icColorId', 'Yellow');
            $this->setAntDesignDatePicker($browser, '#icExpiryDate', now()->addYears(5));
            $browser
                ->typeSlowly('#icNumber', '99762534')
                ->waitForText('IC can only start with: 00, 01, 30, 31, 50, 51.');
        });
    }

    public function test_ic_check_for_max_length()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.');
            $this->setAntDesignSelect($browser, '#icTypeId', 'Personal');
            $this->setAntDesignSelect($browser, '#icColorId', 'Yellow');
            $this->setAntDesignDatePicker($browser, '#icExpiryDate', now()->addYears(5));
            $browser
                ->typeSlowly('#icNumber', '0192345609')
                ->waitForText('IC must be 8 characters long.');
        });
    }

    public function test_ic_check_for_min_length_for_ic_types_other_than_personal()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.');
            $this->setAntDesignSelect($browser, '#icTypeId', 'Company');
            $this->setAntDesignSelect($browser, '#icColorId', 'Yellow');
            $this->setAntDesignDatePicker($browser, '#icExpiryDate', now()->addYears(5));
            $browser
                ->typeSlowly('#icNumber', '1234')
                ->keys('#icNumber', ...$this->generateBackspaces(3))
                ->waitForText('IC must have 3 or more characters.');
        });
    }

    public function test_ic_check_for_color_id_change_on_ic_number_change()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser
                ->visit(env('FRONTEND_URL').'/customers/create')
                ->waitForText('Please enter ic details.');
            $this->setAntDesignSelect($browser, '#icTypeId', 'Personal');
            $this->setAntDesignSelect($browser, '#icColorId', 'Yellow');
            $this->setAntDesignDatePicker($browser, '#icExpiryDate', now()->addYears(5));
            $browser
                ->typeSlowly('#icNumber', '00875490')
                ->assertPresent('#icColorId .ant-select-selection-item[title="Yellow"]')
                ->keys('#icNumber', ...$this->generateBackspaces())
                ->typeSlowly('#icNumber', '01875490')
                ->assertPresent('#icColorId .ant-select-selection-item[title="Yellow"]')
                ->keys('#icNumber', ...$this->generateBackspaces())
                ->typeSlowly('#icNumber', '30875490')
                ->assertPresent('#icColorId .ant-select-selection-item[title="Green"]')
                ->keys('#icNumber', ...$this->generateBackspaces())
                ->typeSlowly('#icNumber', '31875490')
                ->assertPresent('#icColorId .ant-select-selection-item[title="Green"]')
                ->keys('#icNumber', ...$this->generateBackspaces())
                ->typeSlowly('#icNumber', '50875490')
                ->assertPresent('#icColorId .ant-select-selection-item[title="Red"]')
                ->keys('#icNumber', ...$this->generateBackspaces())
                ->typeSlowly('#icNumber', '51875490')
                ->assertPresent('#icColorId .ant-select-selection-item[title="Red"]');
        });
    }
}
