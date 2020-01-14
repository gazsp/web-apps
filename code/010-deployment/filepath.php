<?php

// Get filename path relative to document root (htdocs)
function filepath($filename)
{
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $filename;
}
