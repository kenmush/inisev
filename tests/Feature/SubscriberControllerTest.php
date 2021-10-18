<?php

namespace Tests\Feature;

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
}