<?php

require 'vendor/autoload.php';
require 'src/includes/authentication.php';
require 'src/includes/handler.php';
require 'src/includes/config.php';

$app = new \Slim\App(['settings' => $config]);
$container = $app->getContainer();
setContainer($container);

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

require_once './src/controller/UserController.php';
require_once './src/controller/LoginController.php';

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});

$app->run();