<?php

require_once 'src/includes/authentication.php';
require_once 'src/repository/LoginRepository.php';

class LoginService
{

  /** 
   * "/login" Endpoint - Check if is login is correct
   */
  public function login($login_data)
  {
    try {
      $login = new LoginRepository();
      $response = $login->login($login_data['username']);

      if ($response[0]['password'] != $login_data['password']) {
        throw new Exception('WRONG_PASSWORD');
      }

      $jwt = generateToken($response[0]);

      return json_encode($jwt);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
