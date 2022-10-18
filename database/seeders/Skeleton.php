<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Skeleton extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ic_type')->insert([
            [
                'id' => 1,
                'name' => 'Personal',
            ],
            [
                'id' => 2,
                'name' => 'Company',
            ],
            [
                'id' => 3,
                'name' => 'Passport',
            ],
        ]);
        DB::table('ic_color')->insert([
            [
                'id' => 1,
                'name' => 'Yellow',
            ],
            [
                'id' => 2,
                'name' => 'Green',
            ],
        ]);
        DB::table('communication_channel')->insert([
            [
                'id' => 1,
                'name' => 'Sms',
            ],
            [
                'id' => 2,
                'name' => 'Email',
            ],
            [
                'id' => 3,
                'name' => 'WhatsApp',
            ],
        ]);
        DB::table('country')->insert([
            [
                'id' => 1,
                'name' => 'Brunei',
            ],
            [
                'id' => 2,
                'name' => 'Malaysia',
            ],
        ]);
        DB::table('customer_title')->insert([
            [
                'id' => 1,
                'name' => 'Haji',
            ],
            [
                'id' => 2,
                'name' => 'Dr',
            ],
        ]);
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
        DB::table('subscription_type')->insert([
            [
                'id' => 1,
                'name' => 'Prepaid',
            ],
        ]);
        DB::table('subscription_status')->insert([
            [
                'id' => 1,
                'name' => 'Pending',
            ],
            [
                'id' => 2,
                'name' => 'Active',
            ],
            [
                'id' => 3,
                'name' => 'Expired',
            ],
            [
                'id' => 4,
                'name' => 'Suspended',
            ],
            [
                'id' => 5,
                'name' => 'Terminated',
            ],
        ]);
    }
}
