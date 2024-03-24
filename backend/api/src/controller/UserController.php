<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'src/service/UserService.php';

$app->get('/users', function (Request $request, Response $response, array $args) {
  $userService = $this->get('userService');

  $queryParams = $request->getQueryParams();

  if (count($queryParams) > 0) {
    $limit = filter_var($queryParams['limit'], FILTER_UNSAFE_RAW);
    $offset = filter_var($queryParams['offset'], FILTER_UNSAFE_RAW);

    try {
      $response->getBody()->write($userService->getUsersLazy($limit, $offset, null, null));
    } catch (Exception $error) {
      $response = errorHandler($error);
    }
  } else {
    try {
      $response->getBody()->write($userService->getUsers());
    } catch (Exception $error) {
      $response = errorHandler($error);
    }
  }
  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/users/{userId}', function (Request $request, Response $response, array $args) {
  $userService = $this->get('userService');
  $userId = filter_var($args['userId'], FILTER_UNSAFE_RAW);

  try {
    $response->getBody()->write($userService->getUserById($userId));
  } catch (Exception $error) {
    $response = errorHandler($error);
  }

  return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/users', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();
  $userData = [];
  $userData['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
  $userData['name'] = filter_var($data['name'], FILTER_UNSAFE_RAW);
  $userData['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);
  $userData['birthdate'] = filter_var($data['birthdate'], FILTER_UNSAFE_RAW);
  $userData['email'] = filter_var($data['email'], FILTER_UNSAFE_RAW);

  $userService = $this->get('userService');

  try {
    $response->getBody()->write($userService->addUser($userData));
    $response->withStatus(201);
  } catch (Exception $error) {
    $response = errorHandler($error);
  }
  return $response->withHeader('Content-Type', 'application/json');
});

$app->put('/users', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();

  $userService = $this->get('userService');

  try {
    $userService->updateUser($data);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(204);
  } catch (Exception $error) {
    $response = errorHandler($error);
    return $response->withHeader('Content-Type', 'application/json');
  }
});

$app->delete('/users/{userId}', function (Request $request, Response $response, array $args) {
  $userService = $this->get('userService');
  $userId = filter_var($args['userId'], FILTER_UNSAFE_RAW);

  try {
    $userService->deleteUser($userId);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(204);
  } catch (Exception $error) {
    $response = errorHandler($error);
    return $response->withHeader('Content-Type', 'application/json');
  }
});
