<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CreateAdminSeeder::class,
            PropertyCategoriesSeeder::class,
            PropertyTypesSeeder::class,
            PropertiesSeeder::class,
            PropertyImagesSeeder::class,
            BlogCategoriesSeeder::class,
            BlogsSeeder::class,
            BlogImagesSeeder::class,
            ContactsSeeder::class,
            VisitorDataSeeder::class,
            VisitorJourneySeeder::class,
        ]);
    }
}