<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FooterTest extends TestCase
{
    use RefreshDatabase;

    public function test_footer_social_links_render()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('icon-twitter2', false);
        $response->assertSee('icon-facebook2', false);
        $response->assertSee('icon-instagram', false);
        $response->assertSee('icon-dribbble2', false);
        $response->assertSee('icon-youtube', false);
    }

    public function test_footer_informational_links_render()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Terms &amp; Condition', false);
        $response->assertSee('License', false);
        $response->assertSee('Privacy &amp; Policy', false);
        $response->assertSee('FAQ', false);
    }

    public function test_footer_navigation_links_point_to_real_routes()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee(route('home'), false);
        $response->assertSee(route('properties'), false);
        $response->assertSee(route('agent'), false);
        $response->assertSee(route('blog'), false);
        $response->assertSee(route('contact'), false);
    }
}
