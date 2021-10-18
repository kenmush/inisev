<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
                'title'       => $this->faker->word,
                'description' => $this->faker->text,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),

                'website_id' => function () {
                    return Website::factory()->create()->id;
                },
        ];
    }
}
