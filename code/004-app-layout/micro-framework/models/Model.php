<?php

class Model
{
	/* The PDO database instance */
	protected $db;

    function __construct($db)
    {
        $this->db = $db;
    }

}
