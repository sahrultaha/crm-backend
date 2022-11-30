<?php

namespace Database\Seeders;

use App\Models\Imsi;
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
        $insert = [];
        for ($i = 0; $i < 145; $i++) {
            $insert[] = [
                'imsi' => fake()->unique()->randomNumber(8, true),
                'imsi_status_id' => 1,
                'imsi_type_id' => 1,
                'pin' => fake()->unique()->randomNumber(4, true),
                'puk_1' => fake()->unique()->randomNumber(8, true),
                'puk_2' => fake()->unique()->randomNumber(8, true),
            ];
        }
        Imsi::insert($insert);

        // DB::table('imsi')->insert([
        //     [
        //         'imsi' => 12345678,
        //         'imsi_status_id' => 1,
        //         'imsi_type_id' => 1,
        //         'pin' => 1234,
        //         'puk_1' => 12344321,
        //         'puk_2' => 12344321,
        //     ],
        //     [
        //         'imsi' => 87654321,
        //         'imsi_status_id' => 1,
        //         'imsi_type_id' => 1,
        //         'pin' => 4321,
        //         'puk_1' => 43211234,
        //         'puk_2' => 43211234,
        //     ],
        //     [
        //         'imsi' => 23456789,
        //         'imsi_status_id' => 1,
        //         'imsi_type_id' => 1,
        //         'pin' => 9876,
        //         'puk_1' => 98766789,
        //         'puk_2' => 98766789,
        //     ],
        // ]);
    }
}
