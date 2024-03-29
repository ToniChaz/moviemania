<?php

require_once "Database.php";
require_once "utils.php";

class UserRepository extends Database
{
    public function getAllUsers()
    {
        return $this->select("SELECT name, username, birthdate, email, isAdmin FROM users");
    }

    public function getAllUsersLazy($limit, $offset, $filters, $order)
    {
        $where = buildWhereClause($filters);
        $order = buildOrderClause($order);

        // foreach($filters as $key => $value) {
        //     $where .= strpos($where, "WHERE") !== false ? "AND " : "WHERE ";
        //     $where .= $key." like '%".$value."%' ";
        // }

        // if ($filters["id"]) {
        //     $where .= "WHERE id like '%".$filters["id"]."%' ";
        // }        

        // if ($filters["username"]) {
        //     $where .= strpos($where, "WHERE") !== false ? "AND " : "WHERE ";
        //     $where .= "username like '%".$filters['username']."%' ";
        // }

        // if ($filters["name"]) {
        //     $where .= strpos($where, "WHERE") !== false ? "AND " : "WHERE ";
        //     $where .= "name like '%".$filters['name']."%' ";
        // }    
        
        // if ($filters["birthdate"]) {
        //     $where .= strpos($where, "WHERE") !== false ? "AND " : "WHERE ";
        //     $where .= "birthdate like '%".$filters['birthdate']."%' ";
        // } 

        // if ($filters["email"]) {
        //     $where .= strpos($where, "WHERE") !== false ? "AND " : "WHERE ";
        //     $where .= "email like '%".$filters['email']."%' ";
        // }

        $users = $this->select("SELECT id, name, username, birthdate, email, isAdmin FROM users ".$where.$order." LIMIT ".$limit." OFFSET ".$offset);
        $count = $this->select("SELECT count(*) as totalRecords FROM users ".$where);

        $result = [
            "data" => $users,
            "totalRecords" => $count[0]["totalRecords"]
        ];

        return $result;
    }

    public function getById($userId)
    {
        return $this->select("SELECT name, username, birthdate, email, isAdmin FROM users WHERE id='$userId'");
    }

    public function addUser($userData)
    {
        $username = $userData['username'];
        $name = $userData['name'];
        $password = $userData['password'];
        $birthdate = $userData['birthdate'];
        $email = $userData['email'];
        $isAdmin = 0;

        return $this->insert("INSERT INTO users (username, name, password, birthdate, email, isAdmin) VALUES ('$username', '$name', '$password', '$birthdate', '$email', $isAdmin)");
    }

    public function updateUser($userData)
    {
        $id = $userData['id'];
        $username = $userData['username'];
        $name = $userData['name'];
        $password = $userData['password'];
        $birthdate = $userData['birthdate'];
        $email = $userData['email'];
        $isAdmin = $userData['isAdmin'];

        $query = "UPDATE users 
            SET username='$username',
            name='$name',
            password='$password',
            birthdate='$birthdate',
            email='$email',
            isAdmin=$isAdmin
            WHERE id=$id";

        return $this->executeQuery($query);
    }

    public function deleteUser($userId)
    {
        return $this->executeQuery("DELETE FROM users WHERE id='$userId'");
    }
}
