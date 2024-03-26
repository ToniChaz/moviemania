<?php

require_once "Database.php";

class TokenRepository extends Database
{
    public function addToken($userId, $jwt)
    {
        $refreshToken = $jwt['refreshToken'];
        $refreshTokenExpires = $jwt['refreshTokenExpires'];

        return $this->insert("INSERT INTO tokens (user_id, refresh_token, refresh_token_expires) VALUES ('$userId', '$refreshToken', '$refreshTokenExpires')");
    }

    public function findByToken($token)
    {
        return $this->select("SELECT * FROM tokens WHERE refresh_token='$token'");
    }

    public function findByUserId($userId)
    {
        return $this->select("SELECT * FROM tokens WHERE user_id='$userId'");
    }

    public function deleteToken($tokenId)
    {
        return $this->executeQuery("DELETE FROM tokens WHERE id='$tokenId'");
    }
}
