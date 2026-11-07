<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_loads()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_admin_can_login()
    {
        Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admin@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard.index'));
    }

    public function test_invalid_credentials_fail()
    {
        $response = $this->post('/admin/login', [
            'email' => 'nope@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_non_admin_user_cannot_access_admin_area()
    {
        Admin::create([
            'name' => 'Staff',
            'username' => 'staff',
            'email' => 'staff@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 0,
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'staff@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_admin_can_logout()
    {
        Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);

        $this->post('/admin/login', [
            'email' => 'admin@test.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated('admin');

        $response = $this->post('/admin/logout');

        $response->assertRedirect(route('getLogin'));
        $this->assertGuest('admin');
    }
}
