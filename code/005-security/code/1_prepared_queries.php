<?php

function db()
{
    static $pdo = null;

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

// Previous implementation
function find_user_old($username, $password)
{
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = db()->query($query);

    return $result->fetch();
}

// Prepared query example
function find_user($username, $password)
{
    $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
    $query = db()->prepare($sql);

    $query->execute([
        'username' => $username,
        'password' => $password
    ]);

    return $query->fetch();
}

// SQL Injection instead of a valid username
$username = "1' OR username='admin@example.com'; --";

echo "Old Function - returns admin user!";
$user = find_user_old($username, null);
var_dump($user);

echo "Prepared Statement - fails";
$user = find_user($username, null);
var_dump($user);

