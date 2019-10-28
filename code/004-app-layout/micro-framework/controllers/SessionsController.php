<?php

class SessionsController
{
    function index()
    {
        // Is the user already logged in?
        if (current_user()) {
            return redirect('index');
        }

        // Show the login form
        $content = template('users/login_form');

        return template('layouts/main', [
            'title' => 'Log In',
            'content' => $content
        ]);
    }

    function create()
    {
        // TODO: Log the user in

        // Debug output
        dd(__METHOD__, $_POST);
    }

    function delete()
    {
        // TODO: Log the user out

        // TODO: Return to the login page
    }

}
