<?php

namespace Database\Factories;

use App\Models\Mukim;
use App\Models\District;
use App\Models\PostalCode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class VillageFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'mukim_id' => Mukim::factory(),
            'district_id' => District::factory(),
            'postal_code_id' => PostalCode::factory(),
        ];
    }
}
