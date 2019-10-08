<?php

function db() {
    static $pdo;

    if ($pdo) {
        return $pdo;
    }

    $host       = '127.0.0.1';
    $port       = '3306';
    $db         = 'webapps';
    $username   = 'root';
    $password   = 'root';
    $charset    = 'utf8mb4';

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}

function show_all_users() {
    $result = db()->query("SELECT * FROM users");

    foreach ($result as $k => $v) {
        var_dump($v);
    }
}

show_all_users();
