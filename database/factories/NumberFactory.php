<?php

namespace Database\Factories;

use App\Models\NumberCategory;
use App\Models\NumberStatus;
use App\Models\NumberType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Number>
 */
class NumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->unique()->randomNumber(7, true),
            'number_type_id' => NumberType::factory(),
            'number_status_id' => NumberStatus::factory(),
            'number_category_id' => NumberCategory::factory(),
        ];
    }
}
