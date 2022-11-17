<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductProfileNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('product_profile')->insert([
            [
                'id' => 1,
                'name' => 'Product Profile A',
            ],
            [
                'id' => 2,
                'name' => 'Product Profile B',
            ],
            [
                'id' => 3,
                'name' => 'Product Profile C',
            ],
        ]);
        DB::table('product_network')->insert([
            [
                'id' => 1,
                'name' => '3G',
            ],
            [
                'id' => 2,
                'name' => '4G',
            ],
            [
                'id' => 3,
                'name' => '5G',
            ],
            [
                'id' => 4,
                'name' => 'Suspended',
            ],
            [
                'id' => 5,
                'name' => 'Terminated',
            ],
        ]);
    }
}
