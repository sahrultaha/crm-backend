<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        for ($i = 0; $i < 5; $i++) {

            $insert[] = [
                'subscription_id' =>fake()->unique()->randomNumber(1),
                'number_id' => fake()->unique()->randomNumber(1),
                'imsi_id' => fake()->unique()->randomNumber(1),
                'activation_date' => now(),
            ];
        }
        SubscriptionNumber::insert($insert);
    }
}
