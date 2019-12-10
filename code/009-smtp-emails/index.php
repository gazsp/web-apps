<?php

include 'src/Email.php';
include 'utils.php';

// Email config
$config = include 'config.php';
$smtp = $config['smtp'];

use Snipworks\Smtp\Email;

// Display form
if(empty($_POST)) {
    echo template('index');
    exit;
}
else {
    // Get email body, pass in POST data
    unset($_POST['submit']);
    $html = template('email', ['data' => $_POST]);

    // Build email
    $mail = (new Email($smtp['host'], $smtp['port']))
        ->setLogin($smtp['username'], $smtp['password'])
        ->addTo('hello@example.com', 'John Doe')
        ->setFrom('noreply@example.com', 'Web App Admin')
        ->setSubject('Contact Form')
        ->setHtmlMessage($html);

    // Send it!
    if($mail->send()){
        echo 'Success!';
    } else {
        echo 'An error occurred.';
    }    
}
