<?php

return [
    // General
    'sandbox' => env('AZPAYS_SANDBOX_MODE', false),
    'debug' => env('APP_DEBUG', false),

    // API
    'api' => [
        'url' => env('AZPAYS_API_URL', 'https://azpays.net/api'),
        'sandbox_url' => env('AZPAYS_SANDBOX_API_URL', 'https://sandbox.azpays.net/api'),
        'key' => env('AZPAYS_API_KEY', 'sandbox'),
        'version' => 'v1',
        'endpoints' => [
            'payments' => [
                'create' => 'payments/create',
                'checkout' => 'payments/{token}/checkout',
                'check' => 'payments/{token}/check',
            ],
            'wallets' => [
                'claim' => 'wallets/claim',
            ],
            'subscriptions' => [
                'index' => 'subscriptions',
            ],
        ],
    ],

    // Routes
    'routes' => [
        'enabled' => env('AZPAYS_ROUTES_ENABLED', false),
        'prefix' => env('AZPAYS_ROUTES_PREFIX', 'azpays'),
    ],

    // Merchant
    'merchant' => [
        'key' => env('AZPAYS_MERCHANT_KEY', ''),
    ],
];
