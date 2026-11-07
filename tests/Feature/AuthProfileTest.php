<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_seeded_credentials()
    {
        $this->seed(\Database\Seeders\UserSeeder::class);

        $response = $this->post('/login', [
            'email' => 'john.doe@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticated();
    }

    public function test_profile_requires_auth()
    {
        $response = $this->get('/profile');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_profile()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/profile');
        $response->assertStatus(200);
    }

    public function test_search_section_hidden_for_guests_on_home()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
        $response->assertDontSee('searchProperties');
    }

    public function test_header_shows_login_register_for_guests()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertSee(route('login'), false);
        $response->assertSee(route('register'), false);
        $response->assertDontSee('Profile', false);
        $response->assertDontSee('Logout', false);
    }

    public function test_header_shows_profile_dropdown_for_authenticated_user()
    {
        $user = User::factory()->create(['name' => 'Jane Doe']);

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
        $response->assertSee('Jane Doe', false);
        $response->assertSee(route('profile'), false);
        $response->assertSee(route('logout'), false);
        $response->assertDontSee(route('login'), false);
        $response->assertDontSee(route('register'), false);
    }
}
