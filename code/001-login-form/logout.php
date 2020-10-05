<?php

session_start();

// Clear session - no need to call session_destroy()
$_SESSION = [];

include 'index.php';
