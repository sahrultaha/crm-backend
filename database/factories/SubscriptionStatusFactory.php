<?php

namespace Database\Factories;

use App\Models\SubscriptionType;
use App\Models\SubscriptionStatus;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;


class SubscriptionStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'->fake()->name(),
        ];
    }
}
