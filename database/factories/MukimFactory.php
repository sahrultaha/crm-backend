<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

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
