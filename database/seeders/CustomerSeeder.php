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
                'country_code' => '673',
                'mobile_number' => fake()->numberBetween(7000000, 8000000),
                'ic_number' => fake()->numberBetween(51000000, 51999999),
                'ic_type_id' => 1,
                'ic_color_id' => 1,
                'ic_expiry_date' => now()->addYears(5),
                'country_id' => 1,
                'account_category_id' => 1,
                'birth_date' => now()->subYears(50),
                'created_at' => now(),
            ];
        }
        Customer::insert($insert);
    }
}
