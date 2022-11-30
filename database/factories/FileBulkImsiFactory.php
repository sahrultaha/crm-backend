<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FileBulkImsi>
 */
class FileBulkImsiFactory extends Factory
{
    public function definition()
    {
        return [
            'imsi' => '5280000'.fake()->randomNumber(8, true),
            'pin' => fake()->randomNumber(4, true),
            'puk_1' => fake()->randomNumber(8, true),
            'puk_2' => fake()->randomNumber(8, true),
            'imsi_type_id' => \App\Models\ImsiType::FOUR_G,
            'row_status_id' => \App\Models\RowStatus::NEW,
        ];
    }
}
