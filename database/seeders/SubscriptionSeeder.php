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
        for ($i = 1; $i < 4; $i++) {
            $insert[] = [
                'id' => $i,
                'customer_id' => $i,
                'registration_date' => now()->subYears(1),
                'subscription_status_id' => 2,
                'subscription_type_id' => 1,
                'created_at' => now(),
            ];
        }
        Subscription::insert($insert);
    }
}
