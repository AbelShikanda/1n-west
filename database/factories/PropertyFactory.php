<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categories_id' => 1,
            'types_id' => 1,
            'price' => $this->faker->numberBetween(30000, 200000),
            'name' => $this->faker->unique()->words(3, true),
            'slug' => $this->faker->unique()->slug(),
            'rooms' => $this->faker->numberBetween(1, 5),
            'baths' => $this->faker->numberBetween(1, 4),
            'living_rooms' => $this->faker->numberBetween(1, 3),
            'kitchens' => $this->faker->numberBetween(1, 2),
            'country' => 'Kenya',
            'county' => $this->faker->city(),
            'town' => $this->faker->city(),
            'meta_description' => $this->faker->sentence(),
            'meta_keywords' => $this->faker->words(5, true),
            'meta_image' => 'property-1.jpg',
            'parking' => $this->faker->boolean(),
            'whatsapp' => $this->faker->boolean(),
            'telegram' => $this->faker->boolean(),
            'website' => $this->faker->boolean(),
            'promotion' => $this->faker->boolean(),
        ];
    }
}
