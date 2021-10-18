<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function route;

class WebsiteTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function can_create_a_website()
    {
        $response = $this->post(route('website.store'), [
                'url'  => $this->faker()->url,
                'name' => $this->faker()->name
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
                'id',
                'url',
                'name'
        ]);
    }
}