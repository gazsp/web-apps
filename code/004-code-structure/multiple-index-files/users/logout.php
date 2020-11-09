<?php

include '../includes/utils.php';

session_start();
$_SESSION = [];

redirect('/');
