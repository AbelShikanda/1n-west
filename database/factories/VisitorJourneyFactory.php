<?php

namespace Database\Factories;

use App\Models\VisitorData;
use App\Models\VisitorJourney;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorJourneyFactory extends Factory
{
    protected $model = VisitorJourney::class;

    public function definition()
    {
        return [
            'visitor_data_id' => VisitorData::factory(),
            'page_url' => '/' . $this->faker->slug(2),
            'event_type' => $this->faker->randomElement(['page_view', 'click', 'form_submit']),
            'visited_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
