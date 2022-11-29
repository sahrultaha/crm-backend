<?php

namespace Database\Seeders;

use App\Models\FileCategory;
use App\Models\FileRelationType;
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
                'id' => FileCategory::CUSTOMER_IC_FRONT,
                'name' => 'Customer IC Front',
            ],
            [
                'id' => FileCategory::CUSTOMER_IC_BACK,
                'name' => 'Customer IC Back',
            ],
            [
                'id' => FileCategory::BULK_IMSI,
                'name' => 'Bulk IMSI file',
            ],
            [
                'id' => FileCategory::BULK_STARTER_PACK,
                'name' => 'Bulk Starter Pack file',
            ],

        ]);

        DB::table('file_relation_type')->insert([
            [
                'id' => FileRelationType::CUSTOMER,
                'name' => 'customer',
            ],
            [
                'id' => FileRelationType::BULK_IMSI,
                'name' => 'file_bulk_imsi',
            ],
            [
                'id' => FileRelationType::BULK_STARTER_PACK,
                'name' => 'file_bulk_starter_pack',
            ],
        ]);
        $this->alterSequence('file_category');
        $this->alterSequence('file_relation_type');
    }
}
