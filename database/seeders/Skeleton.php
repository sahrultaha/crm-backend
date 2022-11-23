<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Skeleton extends Seeder
{
    use TraitAlterSequence;

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
        $this->alterSequence('ic_type');
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
        $this->alterSequence('ic_color');
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
        $this->alterSequence('communication_channel');
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
        $this->alterSequence('account_category');
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
        $this->alterSequence('customer_title');
        DB::table('subscription_type')->insert([
            [
                'id' => 1,
                'name' => 'Prepaid',
            ],
        ]);
        $this->alterSequence('subscription_type');
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
        $this->alterSequence('subscription_status');
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
        $this->alterSequence('order_status');
        DB::table('address_type')->insert([
            [
                'id' => 1,
                'name' => 'Billing Address',
            ],
            [
                'id' => 2,
                'name' => 'Service Address',
            ],
        ]);
        $this->alterSequence('address_type');
    }
}
