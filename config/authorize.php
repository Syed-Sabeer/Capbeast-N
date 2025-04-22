<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authorize.net API Credentials
    |--------------------------------------------------------------------------
    |
    | This section contains the configuration for connecting to the Authorize.net
    | payment gateway API. The credentials can be managed via the .env file.
    | Use AUTHORIZE_NET_ENVIRONMENT=sandbox for testing and production for live.
    |
    */

    'login_id' => env('AUTHORIZE_NET_LOGIN_ID', ''),
    'transaction_key' => env('AUTHORIZE_NET_TRANSACTION_KEY', ''),
    'environment' => env('AUTHORIZE_NET_ENVIRONMENT', 'sandbox'), // sandbox or production

    /*
    |--------------------------------------------------------------------------
    | API Endpoints
    |--------------------------------------------------------------------------
    |
    | Define the API endpoints for sandbox (testing) and production environments.
    |
    */

    'endpoints' => [
        'sandbox' => 'https://apitest.authorize.net/xml/v1/request.api',
        'production' => 'https://api.authorize.net/xml/v1/request.api',
    ],
];
