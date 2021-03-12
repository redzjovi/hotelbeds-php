<?php

return [
    'hotel' => [
        'api_key' => env('HOTELBEDS_HOTEL_API_KEY', 'API_KEY'),
        'language' => [
            'codes' => [
                'ENG',
                'IND',
            ],
        ],
        'production' => env('HOTELBEDS_HOTEL_PRODUCTION', false),
        'secret' => env('HOTELBEDS_HOTEL_SECRET', 'SECRET'),
    ],
    'table_names' => [
        'hotel' => [
            'description' => 'hotelbeds_hotel_description',
            'descriptions' => 'hotelbeds_hotel_descriptions',
            'language' => 'hotelbeds_hotel_language',
            'languages' => 'hotelbeds_hotel_languages',
        ],
    ],
];
