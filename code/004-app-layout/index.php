<?php

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

// Work out which method to call on the controller and then call it,
// returning the result to the browser
$method = $methods[request_method()] ?? 'index';
echo $controller->$method();
