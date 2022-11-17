<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImsiTypeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('imsi_type')->insert([
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
        ]);
        DB::table('imsi_status')->insert([
            [
                'id' => 1,
                'name' => 'Available',
            ],
            [
                'id' => 2,
                'name' => 'Active',
            ],
            [
                'id' => 3,
                'name' => 'Terminated',
            ],
        ]);
    }
}
