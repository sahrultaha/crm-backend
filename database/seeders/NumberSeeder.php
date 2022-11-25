<?php

namespace Database\Seeders;

use App\Models\Number; //added new
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
        $insert = [];
        for ($i = 0; $i < 145; $i++) {
            $insert[] = [
                'number' => fake()->unique()->randomNumber(7, true),
                'number_type_id' => 1,
                'number_status_id' => 1,
                'number_category_id' => 1,
                'created_at' => now(),
            ];
        }
        Number::insert($insert);

        // DB::table('number')->insert([
        //     [
        //         'number' => 1234567,
        //         'number_type_id' => 1,
        //         'number_status_id' => 1,
        //         'number_category_id' => 1,
        //     ],
        //     [
        //         'number' => 9876543,
        //         'number_type_id' => 1,
        //         'number_status_id' => 1,
        //         'number_category_id' => 1,
        //     ],
        //     [
        //         'number' => 2345678,
        //         'number_type_id' => 1,
        //         'number_status_id' => 1,
        //         'number_category_id' => 1,
        //     ],
        // ]);
    }
}
