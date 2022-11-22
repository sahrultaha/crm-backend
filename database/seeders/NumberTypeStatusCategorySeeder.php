<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberTypeStatusCategorySeeder extends Seeder
{
    use TraitAlterSequence;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('number_type')->insert([
            [
                'id' => 1,
                'name' => 'Prepaid',
            ],
            [
                'id' => 2,
                'name' => 'Postpaid Port in',
            ],
        ]);
        DB::table('number_status')->insert([
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
        DB::table('number_category')->insert([
            [
                'id' => 1,
                'name' => 'Normal',
            ],
            [
                'id' => 2,
                'name' => 'Gold',
            ],
        ]);
        $this->alterSequence('number_type');
        $this->alterSequence('number_status');
        $this->alterSequence('number_category');
    }
}
