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

      foreach ($response as &$user) {
        unset($user['password']);
      }

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

      if (empty($response)) {
        throw new Exception("NOT_FOUND");
      }

      unset($response[0]['password']);

      return json_encode($response);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
