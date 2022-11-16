<?php

namespace Database\Factories;

use App\Models\ProductNetwork;
use App\Models\ProductProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'product_profile_id' => ProductProfile::factory(),
            'product_network_id' => ProductNetwork::factory(),
        ];
    }
}
