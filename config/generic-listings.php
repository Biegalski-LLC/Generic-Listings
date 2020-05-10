<?php

return [
    'features' => [
        'enable_address' => env('GENERIC_LISTINGS_ENABLE_ADDRESSES', true),
        'enable_categories' => env('GENERIC_LISTINGS_ENABLE_CATEGORIES', true),
        'enable_contact' => env('GENERIC_LISTINGS_ENABLE_CONTACTS', true),
        'enable_inventory' => env('GENERIC_LISTINGS_ENABLE_INVENTORY', true),
        'enable_media' => env('GENERIC_LISTINGS_ENABLE_MEDIA', true),
        'enable_pricing' => env('GENERIC_LISTINGS_ENABLE_PRICING', true),
        'enable_tags' => env('GENERIC_LISTINGS_ENABLE_TAGS', true),
        'enable_views' => env('GENERIC_LISTINGS_ENABLE_VIEWS', true),
    ],
    'relationships' => [
        'listing' => [
            'address',
            'categories',
            'contacts',
            'inventory',
            'media',
            'ratings',
            'reviews',
            'tags',
            'views'
        ]
    ],
    'user_table' => [
        'name' => env('GENERIC_LISTINGS_USER_TABLE_NAME', 'users'),
        'email_column' => env('GENERIC_LISTINGS_USER_TABLE_EMAIL', 'email'),
        'identifier_key' => env('GENERIC_LISTINGS_USER_TABLE_KEY', 'id'),
        'model_fpqn' => env('GENERIC_LISTINGS_USER_TABLE_FPQN', 'App\User')
    ]
];
