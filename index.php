<?php

// front controller
$action = $_GET['action'] ?? null;
$controller = $_GET['controller'] ?? null;

$controller = ucfirst($controller) . 'Controller';
require("./app/controllers/$controller".'.php');
$controllerObj = new $controller;
$controllerObj->$action();
