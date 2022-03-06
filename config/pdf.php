<?php


return [
    'mode'                  => 'utf-8',
    'format'                => 'A6',
    'author'                => 'Payro24',
    'subject'               => '',
    'keywords'              => '',
    'creator'               => 'Payro24',
    'display_mode'          => 'fullpage',
    'tempDir'               => base_path('public/temp/'),
    'font_path' => base_path('public/front/font/'),
    'font_data' => [
        'fa' => [
            'R'  => 'IRANSansWeb_Light.ttf',
            'B'  => 'IRANSansWeb_Light.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'en' => [
            'R'  => 'IRANSansWeb_Light.ttf',
            'B'  => 'IRANSansWeb_Light.ttf',
        ]
    ]
];
