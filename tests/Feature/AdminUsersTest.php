<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUsersTest extends TestCase
{
    use RefreshDatabase;

    protected function admin()
    {
        return Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);
    }

    public function test_users_index_requires_auth()
    {
        $response = $this->get('/admin/users');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_users()
    {
        $admin = $this->admin();
        User::factory()->create(['name' => 'Tenant User', 'email' => 'tenant@test.com', 'tenant' => true]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/users');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
    }

    public function test_admin_can_create_user()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/users', [
            'name' => 'New User',
            'email' => 'newuser@test.com',
            'password' => 'password123',
            'tenant' => true,
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', ['email' => 'newuser@test.com']);
    }

    public function test_user_store_validation_requires_fields()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/users', []);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_admin_can_delete_user()
    {
        $admin = $this->admin();
        $target = User::factory()->create(['name' => 'Delete Me', 'email' => 'delete@test.com']);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/users/' . $target->id);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $target->id]);
    }
}
