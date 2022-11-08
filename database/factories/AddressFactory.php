<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Mukim;
use App\Models\PostalCode;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => fake()->name(),
            'simpang' => fake()->name(),
            'house_number' => fake()->name(),
            'district_id' => District::factory(),
            'mukim_id' => Mukim::factory(),
            'village_id' => Village::factory(),
            'postal_code_id' => PostalCode::factory(),
            'block' => fake()->name(),
            'floor' => fake()->name(),
            'unit' => fake()->name(),
            'building_name' => fake()->name(),
        ];
    }
}
