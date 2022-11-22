<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackTypeSeeder extends Seeder
{
    use TraitAlterSequence;

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
                'name' => 'Easi 4G',
            ],
            [
                'id' => 2,
                'name' => 'Easi Tourist 4G',
            ],
            [
                'id' => 3,
                'name' => 'Easi 5G',
            ],
        ]);
        $this->alterSequence('pack_type');
    }
}
