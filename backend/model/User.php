<?php

require_once PROJECT_ROOT_PATH . "/model/Database.php";

class User extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }
}
?>