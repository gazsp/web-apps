<?php

session_start();
include '../includes/utils.php';

$logged_in = false;
$login_error = false;

// Has the user submitted the form?
if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($user = find_user($_POST['username'], $_POST['password'])) {
            $_SESSION['user'] = $user;
        }
        else {
            $login_error = true;
        }
    }
}

$logged_in = $_SESSION['user'] ?? false;

if ($logged_in) {
    redirect('/');
}
else {
    include "login_form.php";
}
