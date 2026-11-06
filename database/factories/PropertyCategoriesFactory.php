<?php

namespace Database\Factories;

use App\Models\PropertyCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Residential', 'Commercial', 'Industrial']),
            'slug' => $this->faker->slug(),
        ];
    }
}
