<?php

require_once 'src/repository/UserRepository.php';

class UserService
{
  /** 
   * GET "/users" Endpoint - Get list of all users 
   */
  public function getUsers()
  {
    try {
      $repository = new UserRepository();
      $response = $repository->getAllUsers();

      return json_encode($response);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }

  public function getUsersLazy($limit, $offset, $filters, $order)
  {
    try {
      $repository = new UserRepository();
      $response = $repository->getAllUsersLazy($limit, $offset, $filters, $order);

      return json_encode($response);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }

  /** 
   * GET "/users/{userId}" Endpoint - Get user by id 
   */
  public function getUserById($user_id)
  {
    try {
      $repository = new UserRepository();
      $response = $repository->getById($user_id);

      if (empty($response)) {
        throw new Exception("NOT_FOUND");
      }

      return json_encode($response[0]);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }

  /** 
   * POST "/users" Endpoint - Add new user
   */
  public function addUser($user_data)
  {
    try {
      $repository = new UserRepository();
      $response = $repository->addUser($user_data);

      if (!$response) {
        throw new Exception("USER_ERROR");
      }

      $user_data['id'] = $response;

      return json_encode($user_data);
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }

    /** 
   * PUT "/users" Endpoint - Update user by id 
   */
  public function updateUser($user_data)
  {
    try {
      $repository = new UserRepository();
      $response = $repository->updateUser($user_data);

      if (!$response) {
        throw new Exception("USER_ERROR");
      }
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }

  /** 
   * DELETE "/users" Endpoint - Delete user by id 
   */
  public function deleteUser($user_id)
  {
    try {
      $repository = new UserRepository();
      $response = $repository->deleteUser($user_id);

      if (!$response) {
        throw new Exception("USER_ERROR");
      }
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
