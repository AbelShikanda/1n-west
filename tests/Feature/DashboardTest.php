<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_redirected_to_login()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_dashboard_loads_for_admin()
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard.dashboard');
    }
}
