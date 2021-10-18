<?php

namespace Tests\Feature;

use App\Events\NewPostEvent;
use App\Models\Subscriber;
use App\Models\Subscriptions;
use App\Models\Website;
use Event;
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
        Event::fake();

        $website = Website::factory()->create();

        $response = $this->post(route('posts.store'), [
                'title'       => $this->faker->title,
                'description' => $this->faker()->paragraph(),
                'website_id'  => $website->id
        ]);

        Event::assertDispatched(NewPostEvent::class);
        $response->assertStatus(201);
        $response->assertJsonStructure([
                'id',
                'title',
                'description'
        ]);
    }

    /** @test * */
    public function it_can_create_a_post_and_send_email_to_subscribers()
    {
//        Event::fake();

        $website = Website::factory()->create();

        $subscriber = Subscriber::factory()->create();

        Subscriptions::factory()->create([
                'website_id'    => $website->id,
                'subscriber_id' => $subscriber->id
        ]);

        $response = $this->post(route('posts.store'), [
                'title'       => $this->faker->title,
                'description' => $this->faker()->paragraph(),
                'website_id'  => $website->id
        ]);

//        Event::assertDispatched(NewPostEvent::class);
        $response->assertStatus(201);
        $response->assertJsonStructure([
                'id',
                'title',
                'description'
        ]);
    }
}