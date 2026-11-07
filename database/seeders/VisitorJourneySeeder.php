<?php

namespace Database\Seeders;

use App\Models\VisitorData;
use App\Models\VisitorJourney;
use Illuminate\Database\Seeder;

class VisitorJourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visitorIds = VisitorData::query()->pluck('id')->values();

        if ($visitorIds->isEmpty()) {
            return;
        }

        $first = $visitorIds[0];
        $second = $visitorIds[1] ?? $first;

        $journeys = [
            ['visitor_data_id' => $first, 'page_url' => '/home', 'event_type' => 'page_visit'],
            ['visitor_data_id' => $first, 'page_url' => '/properties', 'event_type' => 'page_visit'],
            ['visitor_data_id' => $second, 'page_url' => '/properties/test-apartment', 'event_type' => 'page_visit'],
            ['visitor_data_id' => $second, 'page_url' => '/checkout', 'event_type' => 'conversion'],
        ];

        foreach ($journeys as $journey) {
            VisitorJourney::updateOrCreate(
                $journey,
                ['visited_at' => now()]
            );
        }
    }
}
