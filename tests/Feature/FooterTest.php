<?php

namespace Tests\Feature;

use Database\Seeders\SettingsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FooterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(SettingsSeeder::class);
    }

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

    public function test_footer_uses_configured_settings()
    {
        \App\Models\Setting::set('site_name', 'Custom Site');
        \App\Models\Setting::set('social_twitter', 'https://twitter.com/custom');

        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Custom Site', false);
        $response->assertSee('https://twitter.com/custom', false);
    }

    public function test_footer_shows_placeholder_when_socials_are_not_configured()
    {
        foreach (['twitter', 'facebook', 'instagram', 'linkedin', 'youtube', 'dribbble'] as $network) {
            \App\Models\Setting::set('social_' . $network, '');
        }

        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Social profiles coming soon.', false);
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
