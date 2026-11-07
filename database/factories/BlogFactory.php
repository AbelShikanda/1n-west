<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'category_id' => BlogCategories::factory(),
            'title' => $this->faker->sentence(4),
            'slug' => null,
            'content' => $this->faker->paragraphs(3, true),
            'featured_image' => 'blog-' . $this->faker->numberBetween(1, 5) . '.jpg',
        ];
    }
}
