<?php

class IndexController
{
    function index()
    {
        // Does the user need to log in?
        if (!current_user()) {
            return redirect('sessions');
        }

        // TODO: Display the homepage
    }
}
