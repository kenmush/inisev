<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function route;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test * */
    public function it_can_create_a_post()
    {
        $website = Website::factory()->create();

        $response = $this->post(route('posts.store'), [
                'title'       => $this->faker->title,
                'description' => $this->faker()->paragraph(),
                'website_id'  => $website->id
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
                'id',
                'title',
                'description'
        ]);
    }
}