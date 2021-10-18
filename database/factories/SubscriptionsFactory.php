<?php

namespace Database\Factories;

use App\Models\Subscriptions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubscriptionsFactory extends Factory
{
    protected $model = Subscriptions::class;

    public function definition()
    {
        return [
                'website_id'    => $this->faker->randomNumber(),
                'subscriber_id' => $this->faker->randomNumber(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
        ];
    }
}
