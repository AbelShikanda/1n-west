<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_verification_notice_route_exists_for_authenticated_user()
    {
        $user = User::factory()->unverified()->create();
        $response = $this->actingAs($user)->get('/email/verify');
        $response->assertStatus(200);
    }

    public function test_homepage_remains_public()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }
}
