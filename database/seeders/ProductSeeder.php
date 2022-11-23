<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'name' => 'Easi 4G',
                'product_profile_id' => 1,
                'product_network_id' => 1,
            ],
            [
                'name' => 'Easi Tourist 4G',
                'product_profile_id' => 2,
                'product_network_id' => 2,
            ],
            [
                'name' => 'Easi 5G',
                'product_profile_id' => 3,
                'product_network_id' => 3,
            ],
        ]);
    }
}
