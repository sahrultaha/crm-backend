<?php

namespace Database\Seeders;

use App\Models\SubscriptionNumber;
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
        // $n = 1;
        // for ($i = 1; $i < 4; $i++) {
            $insert[] = [
                'subscription_id' => 1,
                'number_id' => 1,
                'imsi_id' => 1,
                'activation_date' => now(),
            ];
        // }
        SubscriptionNumber::insert($insert);
    }
}
