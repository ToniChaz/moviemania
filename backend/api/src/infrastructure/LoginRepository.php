<?php

require_once "Database.php";

class LoginRepository extends Database
{
    public function login($username)
    {
        return $this->select("SELECT * FROM users WHERE username='$username'");
    }
}
