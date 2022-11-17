<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('number')->insert([
            [
                'number' => 1234567,
                'number_type_id' => 1,
                'number_status_id' => 1,
                'number_category_id' => 1,
            ],
            [
                'number' => 9876543,
                'number_type_id' => 1,
                'number_status_id' => 1,
                'number_category_id' => 1,
            ],
            [
                'number' => 2345678,
                'number_type_id' => 1,
                'number_status_id' => 1,
                'number_category_id' => 1,
            ],
        ]);
    }
}
