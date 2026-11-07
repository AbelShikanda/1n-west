<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_factory_creates_verified_user_by_default()
    {
        $user = User::factory()->create(['email' => 'verified@example.com']);

        $this->assertNotNull($user->email_verified_at);
    }

    public function test_user_unverified_state_has_null_email_verified_at()
    {
        $user = User::factory()->unverified()->create(['email' => 'unverified@example.com']);

        $this->assertNull($user->email_verified_at);
    }

    public function test_user_can_be_marked_as_tenant()
    {
        $user = User::factory()->create([
            'email' => 'tenant@example.com',
            'tenant' => true,
        ]);

        $this->assertTrue($user->tenant);
    }
}
