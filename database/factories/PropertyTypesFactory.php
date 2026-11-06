<?php

namespace Database\Factories;

use App\Models\PropertyTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyTypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Apartment', 'Villa', 'Office Space', 'House', 'Condo']),
            'slug' => $this->faker->slug(),
        ];
    }
}
