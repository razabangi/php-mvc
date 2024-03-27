<?php

use app\Controllers\HomeController;
use app\Controllers\ProductController;
use Framework\Router;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function(string $className) {
    require(str_replace('\\', '/', $className) . '.php');
});

$router = new Router();
$router->add('/products/show', ['controller' => ProductController::class, 'action' => 'show']);
$router->add('/', ['controller' => HomeController::class, 'action' => 'index']);
$router->add('/products', ['controller' => ProductController::class, 'action' => 'index']);

if ($segments = $router->match($path)) {
} else {
    exit("No route found.");
}

// front controller
$action = $segments['action'] ?? 'index'; // show
$controller = $segments['controller'] ?? null; // product

$controllerObj = new $controller;
$controllerObj->$action();
