<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class VisitorDataSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\VisitorData::create([
            'ip_address' => '192.168.1.1',
            'country' => 'Kenya',
            'region' => 'Nairobi',
            'city' => 'Nairobi',
            'utm_source' => 'google',
            'utm_medium' => 'organic',
            'utm_campaign' => 'summer_sale',
            'referrer' => 'https://google.com',
            'device' => 'Desktop',
            'browser' => 'Chrome',
        ]);

        \App\Models\VisitorData::create([
            'ip_address' => '192.168.1.2',
            'country' => 'Kenya',
            'region' => 'Mombasa',
            'city' => 'Mombasa',
            'utm_source' => 'facebook',
            'utm_medium' => 'referral',
            'utm_campaign' => 'social_media',
            'referrer' => 'https://facebook.com',
            'device' => 'Mobile',
            'browser' => 'Safari',
        ]);

        \App\Models\VisitorData::create([
            'ip_address' => '192.168.1.3',
            'country' => 'Kenya',
            'region' => 'Kisumu',
            'city' => 'Kisumu',
            'utm_source' => 'direct',
            'utm_medium' => null,
            'utm_campaign' => null,
            'referrer' => null,
            'device' => 'Mobile',
            'browser' => 'Firefox',
        ]);
    }
}