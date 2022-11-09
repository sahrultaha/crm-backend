<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\District;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class MukimFactory extends Factory
{
    public function definition()
    {
        return [
            'district_id' => District::factory(),
            'name' => fake()->name(),
        ];
    }
}
