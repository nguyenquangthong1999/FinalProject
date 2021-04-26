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
        'client_id' => '647163272588714',
        'client_secret' => 'b1b2e076965f5082c63e0fb3973814db',
        'redirect' => 'http://localhost/FinalProject/public/loginadmin/callback',
    ],

    'google' => [
        'client_id' => '803459561983-5h9amin2il614qfdtgt2nq6ne8cbndm6.apps.googleusercontent.com',
        'client_secret' => 'YKqC0sP4A780iiAFzt5nvMTp',
        'redirect' => 'http://localhost/FinalProject/loginadmin/callback2',
    ],

    'github' => [
        'client_id' => '3d4544b2d1323d052d0e',
        'client_secret' => 'f53f6d1320b267dd4ba2e65144ee6170a70e6d06',
        'redirect' => 'http://localhost/FinalProject/loginadmin/callback3', //Authorization callback URL
    ],

    'nexmo' => [
        'sms_from' => '15556666666',
    ],
];
