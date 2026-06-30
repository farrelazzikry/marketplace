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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Calvera ID Custom API Services
    |--------------------------------------------------------------------------
    */

    'rajaongkir' => [
        'key' => env('RAJAONGKIR_API_KEY'),
    ],

    'komerce' => [
        'token' => env('KOMERCE_API_TOKEN'),
        'env' => env('KOMERCE_ENVIRONMENT', 'sandbox'),
        'base_url' => env('KOMERCE_ENVIRONMENT') === 'production'
            ? 'https://api.komerce.id/v1'
            : 'https://api.sandbox.komerce.id/v1', // URL endpoint simulasi QRIS Komerce
    ],
<<<<<<< HEAD
=======
    'midtrans' => [
        'server_key' => env('MIDTRANS_SERVER_KEY'),
        'client_key' => env('MIDTRANS_CLIENT_KEY'),
        'is_sandbox' => env('MIDTRANS_IS_SANDBOX', true),
    ],
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

];