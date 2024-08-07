<?php
return [
    'app' => [
        'name' => 'Official Website of Communication and Works Department',
        'env' => env('APP_ENV', 'production'),
        'debug' => env('APP_DEBUG', true),
        'url' => env('BASE_URL', 'http://localhost/cwmis'),
        'dir' => $_SERVER['DOCUMENT_ROOT'] . '/cwmis',
    ],
    'database' => [
        'host' => env('DB_HOST', '127.0.0.1'),
        'database' => env('DB_NAME', 'cwdgkp_new'),
        'username' => env('DB_USER', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
];
