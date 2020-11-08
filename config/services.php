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
    'facebook' => [
        'client_id' => '2439929359647305',  //client face của bạn
        'client_secret' => 'bbb5b74fc075dc4d708baa6b44fab3be',  //client app service face của bạn
        'redirect' => 'http://localhost/shoplaravel/login-checkout/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '27619800433-jdm59tv77qf7kni9p13qf497h00aqaao.apps.googleusercontent.com',
        'client_secret' => 'cM1oKgkTldHzd_gSH-8tEs-r',
        'redirect' => 'http://localhost/shoplaravel/login-checkout/google/callback'
    ],


];

