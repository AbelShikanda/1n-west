<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogImagesFactory extends Factory
{
    protected $model = BlogImages::class;

    public function definition()
    {
        return [
            'blog_id' => Blog::factory(),
            'image_path' => 'blog-image-' . $this->faker->numberBetween(1, 9) . '.jpg',
        ];
    }
}
