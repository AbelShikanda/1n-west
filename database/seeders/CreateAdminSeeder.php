<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'id' => 5,
                'uuid' => 'e7ed7f10-7e8e-43f5-af31-ee6dfa65eb49',
                'username' => 'abel',
                'name' => 'abel',
                'avatar' => null,
                'email' => 'abelshikanda3@gmail.com',
                'password' => '$2y$10$3LYZlEfKFA4xzo84LPmtHuqDHxWIEcEeMqFNho/FXlLFFOs14aE1a',
                'is_admin' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'uuid' => 'e7ed7f10-7e8e-48f5-af31-ee6dfa65fb49',
                'username' => 'fiona',
                'name' => 'fiona',
                'avatar' => null,
                'email' => 'liszt.luca2@gmail.com',
                'password' => '$2y$10$3LYZlEfKFA4xzo84LPmtHuqDHxWIEcEeMqFNho/FXlLFFOs14aE1a',
                'is_admin' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
