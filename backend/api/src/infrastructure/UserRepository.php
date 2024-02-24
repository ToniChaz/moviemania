<?php

require_once "Database.php";

class UserRepository extends Database
{
    public function getAllUsers()
    {
        return $this->select("SELECT * FROM users");
    }

    public function getById($id)
    {
        return $this->select("SELECT * FROM users WHERE id='$id'");
    }
}
