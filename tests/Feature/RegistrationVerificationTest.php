<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RegistrationVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_registration_sends_verification_email()
    {
        Notification::fake();

        $response = $this->post('/register', [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com',
            'email_verified_at' => null,
        ]);

        Notification::assertSentTo(
            User::where('email', 'newuser@example.com')->first(),
            VerifyEmail::class
        );
    }

    public function test_user_registration_duplicate_email_fails()
    {
        User::factory()->create(['email' => 'existing@example.com']);

        $response = $this->post('/register', [
            'name' => 'Duplicate User',
            'email' => 'existing@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_user_registration_requires_password_confirmation()
    {
        $response = $this->post('/register', [
            'name' => 'No Confirm User',
            'email' => 'noconfirm@example.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
