<?php

class UserModel
{
    function __construct($db)
    {
        $this->db = $db;
    }

    /*
     * Login in a user
     */
    function login($username, $password)
    {
        // Find the user in the database
        $user = $this->find_user($username, $password);

        // TODO: Set $_SESSION['user'] to user object if they exist

        // TODO: Return the user / null
    }

    /*
     * Find a user in the database
     */
    function find_user($username, $password)
    {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = db()->query($query);

        // Return the first row or NULL
        $user = $result->fetch();

        return $user;
    }
}
