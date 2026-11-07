<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $guard = 'admin';

        $permissions = [
            'view-dashboard',
            'manage-property-categories',
            'manage-property-types',
            'manage-roles',
            'manage-permissions',
            'manage-admins',
        ];

        foreach ($permissions as $name) {
            Permission::findOrCreate($name, $guard);
        }

        $superAdmin = Role::findOrCreate('Super Admin', $guard);
        $superAdmin->syncPermissions(Permission::where('guard_name', $guard)->get());

        $adminRole = Role::findOrCreate('Admin', $guard);
        $adminRole->syncPermissions([
            'view-dashboard',
            'manage-property-categories',
            'manage-property-types',
        ]);

        // Assign Super Admin to all existing admins marked as admin
        Admin::where('is_admin', 1)->get()->each(function ($admin) use ($superAdmin) {
            if (! $admin->hasRole($superAdmin)) {
                $admin->assignRole($superAdmin);
            }
        });
    }
}
