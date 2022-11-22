<?php

namespace Database\Factories;

use App\Models\AccountCategory;
use App\Models\Country;
use App\Models\CustomerTitle;
use App\Models\IcColor;
use App\Models\IcType;
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
            'ic_type_id' => IcType::factory(),
            'ic_color_id' => IcColor::factory(),
            'ic_expiry_date' => now()->addYears(5),
            'country_id' => Country::factory(),
            'customer_title_id' => CustomerTitle::factory(),
            'account_category_id' => AccountCategory::factory(),
            'birth_date' => now()->subYears(50),
        ];
    }
}
