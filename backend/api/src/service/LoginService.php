<?php

require_once 'src/includes/authentication.php';
require_once 'src/repository/LoginRepository.php';
require_once 'src/repository/TokenRepository.php';

class LoginService
{

  /** 
   * "/login" Endpoint - Check if is login is correct
   */
  public function login($loginData)
  {
    try {
      $login = new LoginRepository();
      $response = $login->login($loginData['username']);

      if ($response[0]['password'] != $loginData['password']) {
        throw new Exception('WRONG_PASSWORD');
      }

      $auth = new Authentication();
      $jwt = $auth->generateToken($response[0]);
      
      $token = new TokenRepository();
      $userId = $response[0]['id'];

      $oldToken = $token->findByUserId($userId);
      if (isset($oldToken[0]) && count($oldToken[0]) > 0) {
        $token->deleteToken($oldToken[0]['id']);
      }

      $token->addToken($userId, $jwt);

      return json_encode($jwt);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
