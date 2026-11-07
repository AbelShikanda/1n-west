<?php

namespace Database\Factories;

use App\Models\BlogCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoriesFactory extends Factory
{
    protected $model = BlogCategories::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'name' => ucwords($name),
            'slug' => null,
        ];
    }
}
