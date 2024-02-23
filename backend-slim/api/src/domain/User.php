<?php

class User {
    private $id;
    private $username;
    private $email;
    private $isAdmin;

    public function __construct($id, $username, $email, $isAdmin) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function isAdmin() {
        return $this->isAdmin;
    }

    // Setter methods (if needed)
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }
}
?>
