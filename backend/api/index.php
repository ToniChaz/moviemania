<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'src/includes/handler.php';
require 'src/includes/config.php';
require 'src/application/UserController.php';
require 'src/application/LoginController.php';

$app = new \Slim\App(['settings' => $config]);
$container = setContainer($app->getContainer());

$app->get('/users', function (Request $request, Response $response, array $args) {
    $userService = $this->get('userService');

    try {
        $response->getBody()->write($userService->getUsers());
    } catch (Exception $error) {
        $response = errorHandler($error->getMessage());
    }

    return $response;
});

$app->get('/users/{userId}', function (Request $request, Response $response, array $args) {
    $userService = $this->get('userService');
    $userId = filter_var($args['userId'], FILTER_UNSAFE_RAW);;

    try {
        $response->getBody()->write($userService->getUserById($userId));
    } catch (Exception $error) {
        $response = errorHandler($error->getMessage());
    }

    return $response;
});

$app->post('/login', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $login_data = [];
    $login_data['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
    $login_data['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);

    $loginService = $this->get('loginService');
    
    try {
        $response->getBody()->write($loginService->login($login_data));
    } catch (Exception $error) {
        $response = errorHandler($error->getMessage());
    }

    return $response;
});

$app->run();
