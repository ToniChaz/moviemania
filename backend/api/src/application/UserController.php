<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'src/Services/UserService.php';

$app->get('/users', function (Request $request, Response $response, array $args) {
  $user_service = $this->get('userService');

  try {
    $response->getBody()->write($user_service->getUsers());
  } catch (Exception $error) {
    $response = errorHandler($error);
  }

  return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/users/{skip}/{rows}', function (Request $request, Response $response, array $args) {
  $user_service = $this->get('userService');
  $skip = filter_var($args['skip'], FILTER_UNSAFE_RAW);
  $rows = filter_var($args['rows'], FILTER_UNSAFE_RAW);

  $lazyObjDto = $request->getParsedBody();

  try {
    $response->getBody()->write($user_service->getUsersLazy($skip, $rows, $lazyObjDto));
  } catch (Exception $error) {
    $response = errorHandler($error);
  }

  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/users/{userId}', function (Request $request, Response $response, array $args) {
  $user_service = $this->get('userService');
  $user_id = filter_var($args['userId'], FILTER_UNSAFE_RAW);

  try {
    $response->getBody()->write($user_service->getUserById($user_id));
  } catch (Exception $error) {
    $response = errorHandler($error);
  }

  return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/users', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();
  $user_data = [];
  $user_data['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
  $user_data['name'] = filter_var($data['name'], FILTER_UNSAFE_RAW);
  $user_data['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);
  #$user_data['birthdate'] = filter_var($data['birthdate'], FILTER_UNSAFE_RAW);
  $user_data['birthdate'] = '1998-02-14';
  $user_data['email'] = filter_var($data['email'], FILTER_UNSAFE_RAW);

  $user_service = $this->get('userService');

  try {
    $response->getBody()->write($user_service->addUser($user_data));
    $response->withStatus(201);
  } catch (Exception $error) {
    $response = errorHandler($error);
  }
  return $response->withHeader('Content-Type', 'application/json');
});

$app->put('/users', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();

  $user_service = $this->get('userService');

  try {
    $user_service->updateUser($data);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(204);
  } catch (Exception $error) {
    $response = errorHandler($error);
    return $response->withHeader('Content-Type', 'application/json');
  }
});

$app->delete('/users/{userId}', function (Request $request, Response $response, array $args) {
  $user_service = $this->get('userService');
  $user_id = filter_var($args['userId'], FILTER_UNSAFE_RAW);

  try {
    $user_service->deleteUser($user_id);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(204);
  } catch (Exception $error) {
    $response = errorHandler($error);
    return $response->withHeader('Content-Type', 'application/json');
  }

});