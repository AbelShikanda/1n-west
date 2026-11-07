<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Existing admins keep their current password so re-seeding never locks
     * anyone out. The initial password can be overridden with
     * ADMIN_INITIAL_PASSWORD in the environment.
     *
     * @return void
     */
    public function run()
    {
        $initialPassword = (string) env('ADMIN_INITIAL_PASSWORD', 'password');
        $initialPassword = $initialPassword !== '' ? $initialPassword : 'password';

        $admins = [
            [
                'uuid' => 'e7ed7f10-7e8e-43f5-af31-ee6dfa65eb49',
                'username' => 'abel',
                'name' => 'abel',
                'email' => 'abelshikanda3@gmail.com',
            ],
            [
                'uuid' => 'e7ed7f10-7e8e-48f5-af31-ee6dfa65fb49',
                'username' => 'fiona',
                'name' => 'fiona',
                'email' => 'liszt.luca2@gmail.com',
            ],
        ];

        foreach ($admins as $admin) {
            $existing = DB::table('admins')->where('email', $admin['email'])->first();

            if ($existing) {
                DB::table('admins')->where('id', $existing->id)->update([
                    'name' => $admin['name'],
                    'username' => $admin['username'],
                    'is_admin' => true,
                    'is_staff' => false,
                    'updated_at' => now(),
                ]);

                continue;
            }

            DB::table('admins')->insert([
                'uuid' => $admin['uuid'],
                'username' => $admin['username'],
                'name' => $admin['name'],
                'email' => $admin['email'],
                'avatar' => null,
                'password' => Hash::make($initialPassword),
                'is_admin' => true,
                'is_staff' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
