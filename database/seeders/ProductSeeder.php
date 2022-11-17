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
                'name' => 'Product A',
                'product_profile_id' => 1,
                'product_network_id' => 1,
            ],
            [
                'name' => 'Product B',
                'product_profile_id' => 2,
                'product_network_id' => 2,
            ],
            [
                'name' => 'Product C',
                'product_profile_id' => 3,
                'product_network_id' => 3,
            ],
        ]);
    }
}
