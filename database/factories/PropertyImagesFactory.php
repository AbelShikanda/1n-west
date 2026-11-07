<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImagesFactory extends Factory
{
    protected $model = PropertyImages::class;

    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'image_path' => 'property-' . $this->faker->numberBetween(1, 9) . '.jpg',
            'is_primary' => false,
        ];
    }
}
