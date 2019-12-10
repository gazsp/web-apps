<?php

/*
 * Return the filesystem path for a given file name
 */
function filepath($filename)
{
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $filename;
}

/*
 * Load template file
 */
function template($path, $variables = [])
{
    ob_start();

    extract($variables);

    $template = filepath('templates/' . $path . '.php');

    include($template);

    return ob_get_clean();
}
