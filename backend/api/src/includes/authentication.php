<?php

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Authentication 
{
  
  private $key = 'ea554d9fdc5ad1d541b74258b230acb5a9e60bed9efa728b9ffc3406866bb936';
  private $tokenTimeout = 30 * 60;
  private $refreshTokenTimeout = 60 * 60;

  function generateToken($user)
  {
      $expires = time() + $this::$tokenTimeout;
      $token = [
        'iss' => 'moviemania.com',
        'iat' => time(),
        "exp" => $expires,
        'sub' => $user['id'],
        'isAdmin' => $user['isAdmin']
      ];
      $jwt = JWT::encode($token, $this::$key, 'HS256');
      $refreshToken = base64_encode(uniqid($user['username']));
      $refreshTokenExpires = $expires + $this::$refreshTokenTimeout;
  
      return [
        'token' => $jwt,
        'expires' => $expires,
        'refreshToken' => $refreshToken,
        'refreshTokenExpires' => $refreshTokenExpires
      ];
  }
  
  function decodeToken($jwt) {
      global $key;
      return JWT::decode($jwt, new Key($key, 'HS256'),);
  }
}

?>