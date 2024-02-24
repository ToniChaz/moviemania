<?php

require_once 'src/infrastructure/LoginRepository.php';

class LoginController
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

      if ($response[0]['password'] == $login_data['password']) {
        return json_encode($response);
      }
      
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
