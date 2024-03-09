<?php

function setContainer($container)
{
  $container['userService'] = function ($container) {
    $userService = new UserService();
    return $userService;
  };
  $container['loginService'] = function ($container) {
    $loginService = new LoginService();
    return $loginService;
  };
}

function errorHandler($error)
{
  $message = $error->getMessage();
  if ($message == 'NOT_FOUND') {
    $response = new \Slim\Http\Response(404);
  } else if ($message == 'WRONG_PASSWORD') {
    $response = new \Slim\Http\Response(401);
  } else if ($message == 'USER_ERROR') {
    $response = new \Slim\Http\Response(409);
  } else {
    $response = new \Slim\Http\Response(500);
  }

  $response->write(json_encode(
    array(
      "error" => $response->getStatusCode(),
      "reason" => $response->getReasonPhrase(),
      "message" => $message
    )
  ));

  return $response;
}
