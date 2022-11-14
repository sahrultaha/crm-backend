<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Address;
use App\Models\AddressType;
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
            // 'customer_id' => Customer::factory(),
            // 'address_id' => Address::factory(),
            // 'address_type_id' => AddressType::factory(),
        ];
    }
}
