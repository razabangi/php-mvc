<?php

use app\Controllers\Home;
use app\Controllers\Products;
use Framework\Router;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function(string $className) {
    require(str_replace('\\', '/', $className) . '.php');
});

$router = new Router();
$router->add("/{controller}/{action}");
$router->add('/products/show', ['controller' => "products", 'action' => 'show']);
$router->add('/', ['controller' => "home", 'action' => 'index']);
$router->add('/products', ['controller' => "products", 'action' => 'index']);

if ($segments = $router->match($path)) {
} else {
    exit("No route found.");
}

// front controller
$action = $segments['action'] ?? 'index'; // show
$controller = "App\Controllers\\" . ucwords($segments["controller"]);
$controllerObj = new $controller;
$controllerObj->$action();
