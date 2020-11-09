<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/autoload.php';
include 'includes/utils.php';
include 'includes/db.php';

// Get the controller action from the 'action' query parameter
$action = $_GET['action'] ?? 'index';

// Get the controller class name
$class = ucfirst($action) . 'Controller';

// Include the controller class, and create the controller object
require "controllers/{$class}.php";
$controller = new $class();

// Map HTTP methods to controller methods
$methods = [
    'POST'   => 'create',
    'PUT'    => 'update',
    'GET'    => 'index',
    'DELETE' => 'delete'
];

// Work out which method to call on the controller...
$method = $methods[request_method()] ?? null;

// Start the session so we can store logged in / out state etc.
session_start();

// Check the HTTP method is valid, and that the controller method exists
if (!$method or !method_exists($controller, $method)) {
    page_not_found();
    exit;
}

// ... and then call it, returning the result to the browser
echo $controller->$method();
