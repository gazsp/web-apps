<?php

function db()
{
    static $pdo = null;

    if ($pdo) {
        return $pdo;
    }

    $host       = '127.0.0.1';
    $port       = '3306';
    $db         = 'webapps';
    $username   = 'root';
    $password   = 'root';
    $charset    = 'utf8mb4';

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}

function find_user($username, $password)
{
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = db()->query($query);

    return $result->fetch();
}

function get_posts($user_id)
{
    $query = "SELECT * FROM posts WHERE user_id='$user_id'";
    $result = db()->query($query);

    return $result;
}

// Return the users posts
$posts = get_posts(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>User posts</h1>
    <?php if ($posts->rowCount()): ?>
        <?php while($post = $posts->fetchObject()): ?>
            <div>
                <h2><?= htmlspecialchars($post->title) ?></h2>
                <p>
                    <?= htmlspecialchars($post->body) ?>
                </p>
            </div>
        <?php endwhile ?>
    <?php else: ?>
        <h2>No posts found</h2>
    <?php endif ?>
</div>

</body>
</html>