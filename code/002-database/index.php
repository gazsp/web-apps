<?php

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

var_dump($pdo);
