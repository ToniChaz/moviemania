<?php

require_once "Database.php";
require_once "utils.php";

class UserRepository extends Database
{
    public function getAllUsers()
    {
        return $this->select("SELECT * FROM users");
    }

    public function getAllUsersLazy($skip, $rows, $lazyObjDto)
    {
        $where = buildWhereClause($lazyObjDto['filters']);
        $order = buildOrderClause($lazyObjDto['order']);
        $pagination = $lazyObjDto['pagination'];

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

        $users = $this->select("SELECT * FROM users ".$where.$order." LIMIT ".$pagination['pageSize']." OFFSET ".$pagination['skipRows']);
        $count = $this->select("SELECT count(*) as TotalRegistros FROM users ".$where);

        $result = [
            "data" => $users,
            "totalRecords" => $count[0]["TotalRegistros"]
        ];

        return $result;
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
        $isAdmin = $user_data['isAdmin'];

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

    public function deleteUser($user_id)
    {
        return $this->executeQuery("DELETE FROM users WHERE id='$user_id'");
    }
}
