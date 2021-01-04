<?php

function config($key = null)
{
    // Only load config file once per request by caching the result in a static variable
    static $config = [];

    if (!$config) {
        $config = include 'config.php';
    }

    // Remove any port number from the hostname
    $hostParts = explode(':', $_SERVER['HTTP_HOST']);
    $host = $hostParts[0];

    $result = $config[$host] ?? [];

    // Return a specific key from the array?
    if ($key) {
        $result = $result[$key] ?? [];
    }

    if (!$result) {
        throw new Exception("Config not found for $host");
    }

    return $result;
}
