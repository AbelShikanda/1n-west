<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Seed the site's editable content. firstOrCreate keeps any values an
     * administrator has already customised through the dashboard.
     */
    public function run()
    {
        $settings = [
            'site_name' => '1N-West',
            'site_tagline' => 'Comfort meets convenience',
            'footer_about' => 'Welcome to 1N-West, where comfort meets convenience. Designed with you in mind, offering a blend of modern living, thoughtful amenities, and a welcoming atmosphere that feels like home from day one.',
            'contact_address' => 'Telgat street, Suite 721 Kakamega KE 7905-00200',
            'contact_phone' => '+254 722 729 567',
            'contact_email' => 'info@1n-west.com',
            'contact_website' => 'https://www.1n-west.com',
            'contact_telegram' => '1nwest',
            'social_twitter' => 'https://twitter.com/1nwest',
            'social_facebook' => 'https://facebook.com/1nwest',
            'social_instagram' => 'https://instagram.com/1nwest',
            'social_linkedin' => 'https://linkedin.com/company/1nwest',
            'social_youtube' => 'https://youtube.com/@1nwest',
            'social_dribbble' => 'https://dribbble.com/1nwest',
            'footer_copyright' => '1N-West',
            'footer_credit_name' => 'jke',
            'footer_credit_url' => 'https://jke.co.ke',
            'newsletter_heading' => 'Newsletter',
            'newsletter_text' => 'Subscribe for our newsletter',
            'footer_faq_url' => '/contact',
            'footer_terms_url' => '/home',
            'footer_privacy_url' => '/home',
            'footer_license_url' => '/home',
        ];

        foreach ($settings as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
