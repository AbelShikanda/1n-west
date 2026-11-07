<?php

namespace Database\Seeders;

use App\Models\VisitorData;
use Illuminate\Database\Seeder;

class VisitorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visitors = [
            [
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
            ],
            [
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
            ],
            [
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
            ],
        ];

        foreach ($visitors as $visitor) {
            VisitorData::updateOrCreate(
                ['ip_address' => $visitor['ip_address']],
                $visitor
            );
        }
    }
}
