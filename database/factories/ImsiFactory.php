<?php

namespace Database\Factories;

use App\Models\ImsiStatus;
use App\Models\ImsiType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imsi>
 */
class ImsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imsi' => fake()->randomNumber(8),
            'imsi_status_id' => ImsiStatus::factory(),
            'imsi_type_id' => ImsiType::factory(),
            'pin' => fake()->randomNumber(4),
            'puk_1' => fake()->randomNumber(8),
            'puk_2' => fake()->randomNumber(8),
        ];
    }
}
