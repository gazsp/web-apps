<?php

/*
 * Initialise and return the PDO object for database access
 */
function db()
{
    // Return the PDO object if it's already been initialised
    static $pdo;
    if ($pdo) {
        return $pdo;
    }

    // Get the database config
    $config = include 'config.php';
    $config = $config['db'];

    // Extract the database config to variables ($host, $port, etc.)
    extract($config);

    // Build connection DSN string
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    // Connect to database
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
