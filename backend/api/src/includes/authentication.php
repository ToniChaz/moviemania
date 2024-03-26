<?php

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$key = 'ea554d9fdc5ad1d541b74258b230acb5a9e60bed9efa728b9ffc3406866bb936';

function generateToken($user)
{
    global $key;
    $expires = time() + 60;
    $token = [
      'iss' => 'moviemania.com',
      'iat' => time(),
      "exp" => $expires,
      'sub' => $user['id'],
      'isAdmin' => $user['isAdmin']
    ];
    $jwt = JWT::encode($token, $key, 'HS256');
    $refreshToken = base64_encode(uniqid($user['username']));
    $refreshTokenExpires = $expires + 300;

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

?>