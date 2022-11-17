<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('pack_type')->insert([
            [
                'id' => 1,
                'name' => 'Pack Type A',
            ],
            [
                'id' => 2,
                'name' => 'Pack Type B',
            ],
            [
                'id' => 3,
                'name' => 'Pack Type C',
            ],
        ]);
    }
}
