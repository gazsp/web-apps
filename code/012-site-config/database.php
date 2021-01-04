<?php

function db()
{
    static $pdo = null;

    if ($pdo) {
        return $pdo;
    }

    // Old code
    // $host       = '127.0.0.1';
    // $port       = '3306';
    // $db         = 'webapps';
    // $username   = 'root';
    // $password   = 'root';
    // $charset    = 'utf8mb4';

    // New code - loads db config on a per-host basis
    $config = config('db');
    extract($config);

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
