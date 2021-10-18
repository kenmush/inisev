<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use App\Models\Subscriptions;
use App\Models\Website;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function route;

class SubscriberControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test * */
    public function it_can_create_a_subscriber()
    {
        $response = $this->post(route('subscriber.store'), [
                'email' => $this->faker()->email
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
                'id',
                'email'
        ]);
    }

    /** @test * */
    public function it_can_subscribe_to_a_website()
    {
        $website = Website::factory()->create();
        $subscriber = Subscriber::factory()->create();

        $response = $this->post(route('subscribe.to.website', $website->id), [
                'subscriber' => $subscriber->id,
        ]);

        $response->assertJsonStructure([
                'id',
                'website_id',
                'subscriber_id'
        ]);

    }

    /** @test * */
    public function it_cant_subscribe_to_a_website_that_is_already_subscribed()
    {
        $website = Website::factory()->create();
        $subscriber = Subscriber::factory()->create();

        Subscriptions::factory()->create([
                'website_id'    => $website->id,
                'subscriber_id' => $subscriber->id,
        ]);

        $response = $this->post(route('subscribe.to.website', $website->id), [
                'subscriber' => $subscriber->id,
        ]);


        $response->assertJson([
                'is_subscribed' => ['This user is already subscribed to this website.']
        ]);

    }
}