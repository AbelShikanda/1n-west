<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryIds = BlogCategories::query()->pluck('id')->values();

        if ($categoryIds->isEmpty()) {
            return;
        }

        $blogs = [
            [
                'category_index' => 0,
                'title' => '5 Tips for First-Time Home Buyers',
                'slug' => Str::slug('5 Tips for First-Time Home Buyers'),
                'content' => 'Buying your first home is a major life milestone. Here are 5 tips to help you navigate the process...',
                'featured_image' => 'blog-1.jpg',
            ],
            [
                'category_index' => 1,
                'title' => 'How to Choose the Right Property Manager',
                'slug' => Str::slug('How to Choose the Right Property Manager'),
                'content' => 'Finding a good property manager can make all the difference in your investment returns...',
                'featured_image' => 'blog-2.jpg',
            ],
            [
                'category_index' => 2,
                'title' => 'DIY Home Improvement Projects on a Budget',
                'slug' => Str::slug('DIY Home Improvement Projects on a Budget'),
                'content' => "You don't need to spend a fortune to give your home a fresh look. Here are some affordable DIY projects...",
                'featured_image' => 'blog-3.jpg',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(
                ['slug' => $blog['slug']],
                [
                    'category_id' => $categoryIds[$blog['category_index'] % $categoryIds->count()],
                    'title' => $blog['title'],
                    'content' => $blog['content'],
                    'featured_image' => $blog['featured_image'],
                ]
            );
        }
    }
}