<?php

function setContainer($container)
{
  $container['userService'] = function ($container) {
    $userService = new UserController();
    return $userService;
  };
  $container['loginService'] = function ($container) {
    $loginService = new LoginController();
    return $loginService;
  };
}

function errorHandler($error)
{
  if ($error == 'NOT_FOUND') {
    $response = new \Slim\Http\Response(404);
  } else if ($error == 'WRONG_PASSWORD') {
    $response = new \Slim\Http\Response(401);
  } else {
    $response = new \Slim\Http\Response(500);
  }

  $response->write($response->getReasonPhrase());

  return $response;
}
