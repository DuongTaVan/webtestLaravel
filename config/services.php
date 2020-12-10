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
    'google' => [
        'client_id' => '865001222112-0ajv7tor87u25mph3vlq3agccrfrpd1k.apps.googleusercontent.com',
        'client_secret' => 'Mx3pDbViSCnJ5IeJA9S842Qk',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],
    'facebook' => [
        'client_id' => '1089269138170491',
        'client_secret' => 'd8df54ab8323c499c8f6f0738c5423f1',
        'redirect' => 'http://localhost:8000/facebook/callback/facebook',
    ],

];
