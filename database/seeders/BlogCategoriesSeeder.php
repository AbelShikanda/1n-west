<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategoriesSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Real Estate', 'Property Management', 'Home Improvement', 'Market Trends'];

        foreach ($categories as $name) {
            \App\Models\BlogCategories::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}