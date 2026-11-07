<?php

namespace Database\Seeders;

use App\Models\BlogCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Real Estate', 'Property Management', 'Home Improvement', 'Market Trends'] as $name) {
            BlogCategories::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
