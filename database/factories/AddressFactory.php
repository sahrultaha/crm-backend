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
            'village_id' => Village::factory(),
            'mukim_id' => Mukim::factory(),
            'district_id' => District::factory(),
            'postal_code_id' => PostalCode::factory(),
            'street' => 'Jalan Buku',
            'simpang' => 'Simpang 21',
            'house_number' => 'No 1',
            'block' => 'Block A',
            'floor' => '1st floor',
            'unit' => 'Unit 1B',
            'building_name' => 'Bangunan sini',
        ];
    }
}
