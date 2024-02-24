<?php

require_once 'src/infrastructure/UserRepository.php';

class UserController
{
  /** 
   * "/users" Endpoint - Get list of all users 
   */
  public function getUsers()
  {
    try {
      $user = new UserRepository();
      $response = $user->getAllUsers();
      return json_encode($response);
    } catch (Error $error) {
      return json_encode(
        array('error' => $error->getMessage() . ' Something went wrong! Please contact support.'));
    }
  }
}
?>
