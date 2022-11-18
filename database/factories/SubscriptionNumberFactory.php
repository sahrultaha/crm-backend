<?php

namespace Database\Factories;

use App\Models\Imsi;
use App\Models\Number;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Number>
 */
class SubscriptionNumberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'subscription_id' => Subscription::factory(),
            'number_id' => Number::factory(),
            'imsi_id' => Imsi::factory(),
            'activation_date' => now(),
        ];
    }
}
