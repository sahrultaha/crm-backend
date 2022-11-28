<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        $n = 1;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 1; $j < 30; $j++) {
                $insert[] = [
                    'id' => $n,
                    'customer_id' => $j,
                    'registration_date' => now()->subYears(1),
                    'subscription_status_id' => 2,
                    'subscription_type_id' => 1,
                    'created_at' => now(),
                ];
                $n++;
            }
        }
        Subscription::insert($insert);
    }
}
