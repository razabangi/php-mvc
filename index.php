<?php

// front controller
$action = $_GET['action'] ?? null;
$controller = $_GET['controller'] ?? null;

if ($controller == "product") {
    require('./app/controllers/ProductController.php');
    $controllerObj = new ProductController();
} elseif ($controller == "home") {
    require('./app/controllers/HomeController.php');
    $controllerObj = new HomeController();
} else {
    require('./app/controllers/HomeController.php');
    $controllerObj = new HomeController();
}

if ($action === 'index') {
    $controllerObj->index();
} else if ($action == 'show') {
    $controllerObj->show();
} else {
    $controllerObj->index();
}

// remove php closing tag as per psr if file contain only php remove php closing tag