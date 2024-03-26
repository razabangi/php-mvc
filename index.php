<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $segments = explode('/', $path);

require('./routes/web.php');
$router = new Route();
$router->add('/products/show', ['controller' => 'product', 'action' => 'show']);
$router->add('/', ['controller' => 'home', 'action' => 'index']);
$router->add('/products', ['controller' => 'product', 'action' => 'index']);

if ($segments = $router->match($path)) {
} else {
    exit("No route found.");
}
//request => https://mvc-php.text/product/show
// Array
// (
//     [0] => 
//     [1] => product
//     [2] => show
// )

// front controller
$action = $segments['action'] ?? 'index'; // show
$controller = $segments['controller'] ?? null; // product

$controller = ucfirst($controller) . 'Controller';
require("./app/controllers/$controller".'.php');
$controllerObj = new $controller;
$controllerObj->$action();
