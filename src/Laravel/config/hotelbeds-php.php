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
            'accommodation' => 'hotelbeds_hotel_accommodation',
            'accommodations' => 'hotelbeds_hotel_accommodations',
            'board' => 'hotelbeds_hotel_board',
            'boards' => 'hotelbeds_hotel_boards',
            'description' => 'hotelbeds_hotel_description',
            'descriptions' => 'hotelbeds_hotel_descriptions',
            'language' => 'hotelbeds_hotel_language',
            'languages' => 'hotelbeds_hotel_languages',
        ],
    ],
];
