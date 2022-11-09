<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mukim;

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
        ];
    }
}
