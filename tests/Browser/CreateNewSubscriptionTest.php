<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class CreateNewSubscriptionTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_can_create_new_subscription(): void
    {
        \Illuminate\Support\Facades\DB::statement('delete from subscription_number');
        \Illuminate\Support\Facades\DB::statement('delete from subscription');
        $this->assertDatabaseCount('subscription', 0);
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $today = now();
            $browser
                ->visit(env('FRONTEND_URL').'/subscriptions/create')
                ->waitForText('Ic Number')
                ->typeSlowly('#icNumber', '91098765')
                ->select('#icTypeId', '1')
                ->select('#icColorId', '1')
                ->keys('#icExpiryDate', $today->day)
                ->keys('#icExpiryDate', $today->month)
                ->keys('#icExpiryDate', $today->year)
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
                ->waitForText('MSISDN')
                ->typeSlowly('#number', '3908765')
                ->waitForText('Do you want to create a new pack?')
                ->press('YES')
                ->waitForText('CREATE PACK')
                ->typeSlowly('#imsi', '99770081')
                ->typeSlowly('#pin', '3324')
                ->typeSlowly('#puk1', '99770082')
                ->typeSlowly('#puk2', '99770083')
                ->select('#productId', '1')
                ->keys('#installationDate', $today->day)
                ->keys('#installationDate', $today->month)
                ->keys('#installationDate', $today->year)
                ->keys('#expiryDate', $today->day)
                ->keys('#expiryDate', $today->month)
                ->keys('#expiryDate', $today->year)
                ->press('CREATE PACK')
                ->waitForText('CREATE SUBSCRIPTION')
                ->press('CREATE SUBSCRIPTION')
                ->waitForText('A new subscription has been created.');
        });
        $this->assertDatabaseCount('subscription', 1);
    }
}
