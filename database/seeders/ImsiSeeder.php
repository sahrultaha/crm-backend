<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('imsi')->insert([
            [
                'id' => 1,
                'imsi' => 12345678,
                'imsi_status_id' => 1,
                'imsi_type_id' => 1,
                'pin' => 1234,
                'puk_1' => 12344321,
                'puk_2' => 12344321,
            ],
            [
                'id' => 2,
                'imsi' => 87654321,
                'imsi_status_id' => 1,
                'imsi_type_id' => 1,
                'pin' => 4321,
                'puk_1' => 43211234,
                'puk_2' => 43211234,
            ],
            [
                'id' => 3,
                'imsi' => 23456789,
                'imsi_status_id' => 1,
                'imsi_type_id' => 1,
                'pin' => 9876,
                'puk_1' => 98766789,
                'puk_2' => 98766789,
            ],
        ]);
    }
}
