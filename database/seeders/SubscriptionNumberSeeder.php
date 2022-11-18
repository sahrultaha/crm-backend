<?php

namespace Database\Seeders;

use App\Models\SubscriptionNumber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $n=1;
        for ($i = 1; $i <146; $i++) {
            $insert[] = [
                'subscription_id' => $i,
                'number_id' => $i,
                'imsi_id' => $i,
                'activation_date' =>now(),
            ];
        }
        SubscriptionNumber::insert($insert);
    }
}
