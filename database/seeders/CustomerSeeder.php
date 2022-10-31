<?php

namespace Database\Seeders;

use App\Models\Customer;
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
        for ($i = 0; $i < 30; $i++) {
            $insert[] = [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'mobile_number' => fake()->phoneNumber(),
                'ic_number' => fake()->randomNumber(8),
                'ic_type_id' => 1,
                'ic_color_id' => 1,
                'ic_expiry_date' => now()->addYears(5),
                'country_id' => 1,
                'account_category_id' => 1,
                'birth_date' => now()->subYears(50),
            ];
        }
        Customer::insert($insert);
    }
}
