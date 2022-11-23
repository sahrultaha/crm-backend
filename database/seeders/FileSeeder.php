<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    use TraitAlterSequence;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_category')->insert([
            [
                'id' => 1,
                'name' => 'Customer IC Front',
            ],
            [
                'id' => 2,
                'name' => 'Customer IC Back',
            ],
            [
                'id' => 3,
                'name' => 'Bulk IMSI file',
            ],
        ]);

        DB::table('file_relation_type')->insert([
            [
                'id' => 1,
                'name' => 'Customer',
            ],
        ]);
        $this->alterSequence('file_category');
        $this->alterSequence('file_relation_type');
    }
}
