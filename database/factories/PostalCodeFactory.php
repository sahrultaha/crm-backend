<?php

namespace Database\Factories;

use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class PostalCodeFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            // 'village_id' => Village::factory(),
        ];
    }
}
