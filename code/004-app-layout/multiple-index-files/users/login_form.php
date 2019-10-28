<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3>Log In</h3>

        <form action="" method="POST">
            <?php if ($login_error): ?>
                <div class="alert alert-danger">
                    We were unable to find a user accout matching those details.
                </div>
            <?php endif ?>

            <div class="form-group">
                <label for="Username">Username</label>
                <input name="username" class="form-control" type="text">
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input name="password" class="form-control" type="password">
            </div>

            <input class="btn btn-primary" type="submit" value="Log in">
        </form>
    </div>
</body>

</html>