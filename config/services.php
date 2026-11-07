<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Social Media URLs
    |--------------------------------------------------------------------------
    |
    | Configure the public social media profile URLs used in the site footer.
    | Leave empty to fall back to the home route.
    |
    */

    'social' => [
        'twitter'  => env('SOCIAL_TWITTER_URL'),
        'facebook' => env('SOCIAL_FACEBOOK_URL'),
        'instagram'=> env('SOCIAL_INSTAGRAM_URL'),
        'dribbble' => env('SOCIAL_DRIBBBLE_URL'),
        'youtube'  => env('SOCIAL_YOUTUBE_URL'),
    ],

];
