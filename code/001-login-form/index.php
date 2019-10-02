<?php

// Start a session to store the user logged in status
session_start();

$logged_in = false;

$username = 'hello@example.com';
$password = 'password';

// Has the user submitted the form?
if (!empty($_POST)) {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		if ($_POST['username'] == $username && $_POST['password'] == $password) {
			$_SESSION['logged_in'] = true;
		}
	}
}

$logged_in = $_SESSION['logged_in'] ?? false;

if ($logged_in) {
	include 'logged_in.php';
}
else {
	include "login_form.php";
}
