<?php

// Work out environment from hostname (note use of 'threequals here')
if (strpos('webappscc', $_SERVER['HTTP_HOST']) === false) {
    $env = 'local';
}
else {
    $env = 'live';
}

// Multiple database configs for each env
$config = [
    'db' => [
        // Local db config
        'local' => [
            'host' => 'localhost',
            // ...
        ],

        // Live db config
        'live' => [
            'host' => 'livehost',
            // ...
        ],
    ]
];

$config = include 'config.php';
$config = $config['db'][$env];

// This config should be used to connect to the database
var_dump($config);
