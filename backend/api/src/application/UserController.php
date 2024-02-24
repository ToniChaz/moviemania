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
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }

  /** 
   * "/users/{userId}" Endpoint - Get user by id 
   */
  public function getUserById($userId)
  {
    try {
      $user = new UserRepository();
      $response = $user->getById($userId);

      if (count($response) == 0){
        throw new Exception("NOT_FOUND");
      }

      return json_encode($response);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
