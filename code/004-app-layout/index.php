<?php

include 'includes/utils.php';
include 'includes/db.php';

// Get the controller action from the 'action' query parameter
$action = $_GET['action'] ?? 'index';

// Get the controller class name
$class = ucfirst($action) . 'Controller';

// Include the controller class
require "controllers/{$class}.php";

// Map HTTP methods to controller method names
$methods = [
    'POST' => 'create',
    'PUT' => 'update',
    'GET' => 'index',
    'DELETE' => 'delete'
];

// Create the controller
$controller = new $class();

// Work out which method to call on the controller
$method = $methods[request_method()] ?? 'index';

// ... and call it
echo $controller->$method();
