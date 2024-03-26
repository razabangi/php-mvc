<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);

//request => https://mvc-php.text/product/show
// Array
// (
//     [0] => 
//     [1] => product
//     [2] => show
// )

// front controller
$action = $segments[2] ?? 'index'; // show
$controller = $segments[1] ?? null; // product

$controller = ucfirst($controller) . 'Controller';
require("./app/controllers/$controller".'.php');
$controllerObj = new $controller;
$controllerObj->$action();
