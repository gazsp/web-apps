<?php

session_start();

// Clear session
session_destroy();
$_SESSION = [];

include 'index.php';
