<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WebsiteFactory extends Factory
{
    protected $model = Website::class;

    public function definition()
    {
        return [
                'url'        => $this->faker->url,
                'name'       => $this->faker->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];
    }
}
