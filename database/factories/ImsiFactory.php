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
            'imsi' => '528'.fake()->randomNumber(5, true).fake()->randomNumber(8, true),
            'imsi_status_id' => ImsiStatus::AVAILABLE,
            'imsi_type_id' => ImsiType::FOUR_G,
            'pin' => fake()->randomNumber(4),
            'puk_1' => fake()->randomNumber(8),
            'puk_2' => fake()->randomNumber(8),
        ];
    }
}
