<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'src/includes/config.php';
require 'src/application/UserController.php';

$app = new \Slim\App(['settings' => $config]);

$app->get('/users', function (Request $request, Response $response, array $args) {
    $userController = new UserController();
    $response->getBody()->write($userController->getUsers());
    return $response;
});

$app->get('/users/{userId}', function (Request $request, Response $response, array $args) {
    $userId = $args['userId'];
    $response->getBody()->write("Hello user, $userId");

    return $response;
});

$app->run();

?>