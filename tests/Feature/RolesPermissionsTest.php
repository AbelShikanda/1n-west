<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesPermissionsTest extends TestCase
{
    use RefreshDatabase;

    protected function superAdmin()
    {
        $admin = Admin::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'super@example.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);

        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $admin->assignRole($role);

        return $admin;
    }

    protected function regularAdmin()
    {
        return Admin::create([
            'name' => 'Regular Admin',
            'username' => 'regular',
            'email' => 'regular@example.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);
    }

    public function test_unauthenticated_redirected_to_login()
    {
        $response = $this->get('/admin/roles');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_non_super_admin_cannot_access_roles()
    {
        $admin = $this->regularAdmin();
        $role = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);
        $admin->assignRole($role);

        $response = $this->actingAs($admin, 'admin')->get('/admin/roles');
        $response->assertStatus(403);
    }

    public function test_super_admin_can_view_roles_index()
    {
        $admin = $this->superAdmin();
        Role::create(['name' => 'Viewer', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->get('/admin/roles');
        $response->assertStatus(200);
        $response->assertViewIs('admin.roles.index');
    }

    public function test_super_admin_can_create_role_with_permissions()
    {
        $admin = $this->superAdmin();
        Permission::create(['name' => 'manage-things', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->post('/admin/roles', [
            'name' => 'Manager',
            'permissions' => ['manage-things'],
        ]);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseHas('roles', ['name' => 'Manager', 'guard_name' => 'admin']);
        $role = Role::where('name', 'Manager')->where('guard_name', 'admin')->first();
        $this->assertTrue($role->hasPermissionTo('manage-things'));
    }

    public function test_super_admin_can_update_role()
    {
        $admin = $this->superAdmin();
        $role = Role::create(['name' => 'OldName', 'guard_name' => 'admin']);
        Permission::create(['name' => 'do-stuff', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->put('/admin/roles/' . $role->id, [
            'name' => 'NewName',
            'permissions' => ['do-stuff'],
        ]);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseHas('roles', ['id' => $role->id, 'name' => 'NewName']);
    }

    public function test_super_admin_cannot_delete_super_admin_role()
    {
        $admin = $this->superAdmin();
        $super = Role::where('name', 'Super Admin')->first();

        $response = $this->actingAs($admin, 'admin')->delete('/admin/roles/' . $super->id);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseHas('roles', ['id' => $super->id, 'name' => 'Super Admin']);
    }

    public function test_super_admin_can_delete_role()
    {
        $admin = $this->superAdmin();
        $role = Role::create(['name' => 'Temp', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/roles/' . $role->id);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    public function test_super_admin_can_view_permissions_index()
    {
        $admin = $this->superAdmin();
        Permission::create(['name' => 'perm-a', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->get('/admin/permissions');
        $response->assertStatus(200);
        $response->assertViewIs('admin.permissions.index');
    }

    public function test_super_admin_can_create_permission()
    {
        $admin = $this->superAdmin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/permissions', [
            'name' => 'new-permission',
        ]);

        $response->assertRedirect(route('permissions.index'));
        $this->assertDatabaseHas('permissions', ['name' => 'new-permission', 'guard_name' => 'admin']);
    }

    public function test_super_admin_can_update_permission()
    {
        $admin = $this->superAdmin();
        $perm = Permission::create(['name' => 'old-perm', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->put('/admin/permissions/' . $perm->id, [
            'name' => 'updated-perm',
        ]);

        $response->assertRedirect(route('permissions.index'));
        $this->assertDatabaseHas('permissions', ['id' => $perm->id, 'name' => 'updated-perm']);
    }

    public function test_super_admin_can_delete_permission()
    {
        $admin = $this->superAdmin();
        $perm = Permission::create(['name' => 'temp-perm', 'guard_name' => 'admin']);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/permissions/' . $perm->id);

        $response->assertRedirect(route('permissions.index'));
        $this->assertDatabaseMissing('permissions', ['id' => $perm->id]);
    }

    public function test_permission_validation_requires_name()
    {
        $admin = $this->superAdmin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/permissions', []);
        $response->assertSessionHasErrors('name');
    }
}
