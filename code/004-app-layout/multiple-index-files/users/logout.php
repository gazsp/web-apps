<?php

include '../includes/utils.php';

session_start();

session_destroy();

redirect('users');