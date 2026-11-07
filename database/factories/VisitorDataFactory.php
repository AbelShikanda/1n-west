<?php

namespace Database\Factories;

use App\Models\VisitorData;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorDataFactory extends Factory
{
    protected $model = VisitorData::class;

    public function definition()
    {
        return [
            'ip_address' => $this->faker->ipv4(),
            'country' => $this->faker->country(),
            'region' => $this->faker->state(),
            'city' => $this->faker->city(),
            'utm_source' => $this->faker->optional()->word(),
            'utm_medium' => $this->faker->optional()->randomElement(['cpc', 'email', 'social']),
            'utm_campaign' => $this->faker->optional()->slug(2),
            'referrer' => $this->faker->optional()->url(),
            'device' => $this->faker->randomElement(['desktop', 'mobile', 'tablet']),
            'browser' => $this->faker->randomElement(['Chrome', 'Firefox', 'Safari', 'Edge']),
        ];
    }
}
