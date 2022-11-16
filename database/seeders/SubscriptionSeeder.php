<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
                'customer_id' => randomNumber(1),
                'registration_date' => now(),
                'subscription_status_id' => 1,
                'subscription_type_id' => 1,
            ];
        }
        Subscription::insert($insert);
    }
}
