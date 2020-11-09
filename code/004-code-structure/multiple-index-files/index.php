<?php
    session_start();
    include 'includes/utils.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>My Web App Homepage</h1>

        <?php if(!isset($_SESSION['user'])): ?>
            <p><a href="/users/">Log In</a></p>
        <?php else: ?>
            <p>You are logged in as <?= current_user()['username'] ?></p>
            <p><a href="/posts/">View Posts</a></p>
            <p><a href="/users/logout.php">Log Out</a></p>
        <?php endif ?>
    </div>
</body>

</html>