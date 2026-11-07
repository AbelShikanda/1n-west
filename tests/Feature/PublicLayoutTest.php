<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicLayoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_do_not_render_underconstruction_route()
    {
        foreach (['/home', '/properties', '/agent', '/blog', '/contact'] as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
            $response->assertDontSee('underConstruction', false);
        }
    }

    public function test_footer_newsletter_posts_to_contact_endpoint()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
        $response->assertSee(route('contact.store'), false);
        $response->assertSee('Newsletter subscription', false);
    }

    public function test_header_has_auth_links()
    {
        $response = $this->get('/home');
        $response->assertSee(route('login'), false);
        $response->assertSee(route('register'), false);
        $response->assertSee(route('properties'), false);
    }
}
