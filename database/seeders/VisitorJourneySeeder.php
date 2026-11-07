<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class VisitorJourneySeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\VisitorJourney::create([
            'visitor_data_id' => 1,
            'page_url' => '/home',
            'event_type' => 'page_visit',
            'visited_at' => now(),
        ]);

        \App\Models\VisitorJourney::create([
            'visitor_data_id' => 1,
            'page_url' => '/properties',
            'event_type' => 'page_visit',
            'visited_at' => now(),
        ]);

        \App\Models\VisitorJourney::create([
            'visitor_data_id' => 2,
            'page_url' => '/properties/test-apartment',
            'event_type' => 'page_visit',
            'visited_at' => now(),
        ]);

        \App\Models\VisitorJourney::create([
            'visitor_data_id' => 2,
            'page_url' => '/checkout',
            'event_type' => 'conversion',
            'visited_at' => now(),
        ]);
    }
}