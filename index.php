<?php

use Framework\Dispatcher;
use Framework\Router;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function(string $className) {
    require(str_replace('\\', '/', $className) . '.php');
});

$router = new Router();
$router->add("/product/{slug:[\w-]+}", ['controller' => 'products', 'action' => 'show']);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add('/products/show', ['controller' => "products", 'action' => 'show']);
$router->add('/', ['controller' => "home", 'action' => 'index']);
$router->add('/products', ['controller' => "products", 'action' => 'index']);
$router->add("/{controller}/{action}");

$dispatcher = new Dispatcher($router);
$dispatcher->handle($path);