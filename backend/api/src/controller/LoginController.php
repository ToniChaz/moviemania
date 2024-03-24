<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'src/service/LoginService.php';

$app->post('/login', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();
  $loginData = [];
  $loginData['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
  $loginData['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);

  $loginService = $this->get('loginService');
  
  try {
      $response->getBody()->write($loginService->login($loginData));
  } catch (Exception $error) {
      $response = errorHandler($error);
  }

  return $response->withHeader('Content-Type', 'application/json');
});