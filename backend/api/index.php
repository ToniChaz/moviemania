<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'src/includes/config.php';
require 'src/application/UserController.php';
require 'src/application/LoginController.php';

$app = new \Slim\App(['settings' => $config]);

$app->get('/users', function (Request $request, Response $response, array $args) {
    $userController = new UserController();
    $response->getBody()->write($userController->getUsers());

    return $response;
});

$app->get('/users/{userId}', function (Request $request, Response $response, array $args) {
    $userController = new UserController();
    $userId = filter_var($args['userId'], FILTER_UNSAFE_RAW);;
    $response->getBody()->write($userController->getUserById($userId));

    return $response;
});

$app->post('/login', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $login_data = [];
    $login_data['username'] = filter_var($data['username'], FILTER_UNSAFE_RAW);
    $login_data['password'] = filter_var($data['password'], FILTER_UNSAFE_RAW);

    $loginController = new LoginController();
    $response->getBody()->write($loginController->login($login_data));

    return $response;
});

$app->run();

?>