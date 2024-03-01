<?php

require_once "Database.php";

class UserRepository extends Database
{
    public function getAllUsers()
    {
        return $this->select("SELECT * FROM users");
    }

    public function getById($user_id)
    {
        return $this->select("SELECT * FROM users WHERE id='$user_id'");
    }

    public function addUser($user_data)
    {
        $username = $user_data['username'];
        $name = $user_data['name'];
        $password = $user_data['password'];
        $birthdate = $user_data['birthdate'];
        $email = $user_data['email'];
        $isAdmin = 0;

        return $this->insert("INSERT INTO users (username, name, password, birthdate, email, isAdmin) VALUES ('$username', '$name', '$password', '$birthdate', '$email', $isAdmin)");
    }

    public function updateUser($user_data)
    {

        $id = $user_data['id'];
        $username = $user_data['username'];
        $name = $user_data['name'];
        $password = $user_data['password'];
        $birthdate = $user_data['birthdate'];
        $email = $user_data['email'];
        $isAdmin = 0;

        $query = "UPDATE users SET username='$username', name='$name', password='$password', birthdate='$birthdate', email='$email', isAdmin=$isAdmin WHERE id=$id";

        return $this->executeQuery($query);
    }

    public function deleteUser($user_id)
    {
        return $this->executeQuery("DELETE FROM users WHERE id='$user_id'");
    }
}
