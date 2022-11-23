<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RowStatusSeeder extends Seeder
{
    use TraitAlterSequence;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('row_status')->insert([
            [
                'id' => 1,
                'name' => 'New',
            ],
            [
                'id' => 2,
                'name' => 'Success',
            ],
            [
                'id' => 3,
                'name' => 'Fail',
            ],
        ]);
        $this->alterSequence('row_status');
    }
}
