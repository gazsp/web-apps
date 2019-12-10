<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>
</head>
<body>
    <p>A user sent you a message:</p>
    <?php foreach ($data as $key => $value): ?>
        <p>
            <?= $key ?>: <?= $value ?>
        </p>
    <?php endforeach ?>
</body>
</html>
