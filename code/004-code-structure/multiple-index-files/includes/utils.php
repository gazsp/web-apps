<?php

/*
 * Return the URL for a given path
 */
function url($folder = null)
{
    $folder = trim($folder, '/');

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $link = "https";
    }
    else {
        $link = "http";
    }

    $link .= "://";

    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'] . '/';

    if ($folder) {
        $link .= $folder;
    }

    return $link;
}

/*
 * Return the filesystem path for a given file name
 */
function filepath($filename)
{
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $filename;
}

/*
 * Return the currently logged in user (if any)
 */
function current_user()
{
    return $_SESSION['user'] ?? null;
}

/*
 * Redirect to a given path
 */
function redirect($path)
{
    return header('Location:' . url($path));
}

/*
 * Show 404 page
 */
function page_not_found()
{
    echo "Page not found.";
    exit;
}

/*
 * Dump and Die. Output some variable(s), then exit.
 */
function dd(...$variable)
{
    var_dump($variable);
    exit;
}

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

function find_user($username, $password)
{
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = db()->query($query);

    return $result->fetch();
}
