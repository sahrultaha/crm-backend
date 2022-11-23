<?php

namespace Database\Factories;

use App\Models\Imsi;
use App\Models\Number;
use App\Models\PackType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pack>
 */
class PackFactory extends Factory
{
    public function definition()
    {
        $next_year = \Carbon\Carbon::now()->addYear(1)->format('Y-m-d');

        return [
            'number_id' => Number::factory(),
            'imsi_id' => Imsi::factory(),
            'product_id' => Product::factory(),
            'pack_type_id' => PackType::factory(),
            'installation_date' => date('Y-m-d'),
            'expiry_date' => $next_year,
        ];
    }
}
