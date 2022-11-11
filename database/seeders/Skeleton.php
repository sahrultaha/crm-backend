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
            [
                'id' => 3,
                'name' => 'Purple',
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
        DB::table('account_category')->insert([
            [
                'id' => 1,
                'name' => 'Brunei Personal',
            ],
            [
                'id' => 2,
                'name' => 'Foreign Personal',
            ],
            [
                'id' => 3,
                'name' => 'Company',
            ],
            [
                'id' => 4,
                'name' => 'Embassy',
            ],
            [
                'id' => 5,
                'name' => 'Government',
            ],
        ]);
        DB::table('customer_title')->insert([
            [
                'id' => 1,
                'name' => 'Mr',
            ],
            [
                'id' => 2,
                'name' => 'Ms',
            ],
            [
                'id' => 3,
                'name' => 'Mrs',
            ],
            [
                'id' => 4,
                'name' => 'Haji',
            ],
            [
                'id' => 5,
                'name' => 'Hajah',
            ],
            [
                'id' => 6,
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
        DB::table('product_network')->insert([
            [
                'id' => 1,
                'name' => '3G',
            ],
            [
                'id' => 2,
                'name' => '4G',
            ],
            [
                'id' => 3,
                'name' => '5G',
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
        DB::table('order_status')->insert([
            [
                'id' => 1,
                'name' => 'Active',
            ],
            [
                'id' => 2,
                'name' => 'Submitted',
            ],
            [
                'id' => 3,
                'name' => 'Completed',
            ],
            [
                'id' => 4,
                'name' => 'Cancelled',
            ],
            [
                'id' => 5,
                'name' => 'Invoiced',
            ],
        ]);
        DB::table('imsi_type')->insert([
            [
                'id' => 1,
                'name' => '3G',
            ],
            [
                'id' => 2,
                'name' => '4G',
            ],
        ]);
        DB::table('imsi_status')->insert([
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
    }
}
