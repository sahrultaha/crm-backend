<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('pack')->insert([
            [
                'number_id' => 1,
                'imsi_id' => 1,
                'product_id' => 1,
                'pack_type_id' => 1,
                'installation_date' => now()->subYear(),
                'expiry_date' => now()->addYears(10),
            ],
            [
                'number_id' => 2,
                'imsi_id' => 2,
                'product_id' => 2,
                'pack_type_id' => 2,
                'installation_date' => now()->subYear(),
                'expiry_date' => now()->addYears(10),
            ],
            [
                'number_id' => 3,
                'imsi_id' => 3,
                'product_id' => 3,
                'pack_type_id' => 3,
                'installation_date' => now()->subYear(),
                'expiry_date' => now()->addYears(10),
            ],
        ]);
    }
}
