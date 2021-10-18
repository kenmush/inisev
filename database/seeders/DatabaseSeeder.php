<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Subscriber::factory()->create();
        Website::factory()->create();
        Post::factory(5)->create();
    }
}
