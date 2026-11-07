<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAdminsTest extends TestCase
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

    public function test_admins_index_requires_auth()
    {
        $response = $this->get('/admin/admins');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_admins()
    {
        $admin = $this->admin();
        Admin::factory()->create(['name' => 'Staff', 'username' => 'staff', 'email' => 'staff@test.com', 'is_admin' => 0, 'is_staff' => 1]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/admins');

        $response->assertStatus(200);
        $response->assertViewIs('admin.admins.index');
    }

    public function test_admin_can_create_admin()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/admins', [
            'name' => 'New Admin',
            'username' => 'newadmin',
            'email' => 'newadmin@test.com',
            'password' => 'password123',
            'is_admin' => true,
        ]);

        $response->assertRedirect(route('admin.admins.index'));
        $this->assertDatabaseHas('admins', ['username' => 'newadmin']);
    }

    public function test_admin_store_validation_requires_fields()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/admins', []);

        $response->assertSessionHasErrors(['name', 'username', 'email', 'password']);
    }

    public function test_admin_can_delete_admin()
    {
        $admin = $this->admin();
        $target = Admin::factory()->create(['name' => 'Delete Me', 'username' => 'deleteme', 'email' => 'delete@test.com']);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/admins/' . $target->id);

        $response->assertRedirect(route('admin.admins.index'));
        $this->assertDatabaseMissing('admins', ['id' => $target->id]);
    }
}
