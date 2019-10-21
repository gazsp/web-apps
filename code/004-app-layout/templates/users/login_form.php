    <h3>Log In</h3>

    <form action="<?php echo url('sessions') ?>" method="POST">
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
