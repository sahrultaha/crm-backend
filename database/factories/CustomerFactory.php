<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mobile_number' => fake()->phoneNumber(),
            'ic_number' => fake()->randomNumber(8),
            'ic_type_id' => 1,
            'ic_color_id' => 1,
            'ic_expiry_date' => now()->addYears(5),
            'country_id' => 1,
            'customer_title_id' => 1,
            'account_category_id' => 1,
            'birth_date' => now()->subYears(50),
        ];
    }
}
