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

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/users', function (Request $request, Response $response, array $args) {
    $user_service = $this->get('userService');

    try {
        $response->getBody()->write($user_service->getUsers());
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
    $user_data['birthdate'] = filter_var($data['birthdate'], FILTER_UNSAFE_RAW);
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

$app->put('/users/{userId}', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $user_data = [];
    $user_data['id'] = filter_var($args['userId'], FILTER_UNSAFE_RAW);
    $user_data['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
    $user_data['name'] = filter_var($data['name'], FILTER_UNSAFE_RAW);
    $user_data['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);
    $user_data['birthdate'] = filter_var($data['birthdate'], FILTER_UNSAFE_RAW);
    $user_data['email'] = filter_var($data['email'], FILTER_UNSAFE_RAW);

    $user_service = $this->get('userService');

    try {
        $user_service->updateUser($user_data);
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

$app->post('/login', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $login_data = [];
    $login_data['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
    $login_data['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);

    $loginService = $this->get('loginService');
    
    try {
        $response->getBody()->write($loginService->login($login_data));
    } catch (Exception $error) {
        $response = errorHandler($error);
    }

    return $response->withHeader('Content-Type', 'application/json');
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});

$app->run();