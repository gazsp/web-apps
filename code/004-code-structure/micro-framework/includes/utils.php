<?php

/*
 * Return the URL for a given path
 */
function url($action = null)
{
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $link = "https";
    }
    else {
        $link = "http";
    }

    $link .= "://";

    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'] . '/';

    if ($action) {
        $link .= "?action=" . $action;
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
 * Load view file
 */
function view($path, $variables = [])
{
    ob_start();

    extract($variables);
    $view = filepath('views/' . $path . '.php');
    include($view);

    return ob_get_clean();
}

/*
 * Load and return a model
 */
function model($name)
{
    $class = ucfirst($name . 'Model');

    $path = filepath('models/' . $class . '.php');

    require_once $path;

    // Create a new model and pass in the database object
    $model = new $class(db());

    return $model;
}

/*
 * Retutn the HTTP method for the current request
 */
function request_method()
{
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        if (isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }
    }

    return $method;
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
