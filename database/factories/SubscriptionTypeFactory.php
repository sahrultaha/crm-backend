<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class SubscriptionTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'prepaid',
        ];
    }
}
