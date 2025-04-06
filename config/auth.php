<?php

return [

'defaults' => [
    'guard' => 'web',
    'passwords' => 'users',
],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'marketing' => [
            'driver' => 'session',
            'provider' => 'marketings',
        ],
        'sale' => [
            'driver' => 'session',
            'provider' => 'sales',
        ],
        'superadmin' => [
            'driver' => 'session',
            'provider' => 'superadmins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'superadmins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'sales' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'marketings' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
