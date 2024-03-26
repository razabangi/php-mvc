<?php

require('./app/controllers/ProductController.php');

$controller = new ProductController();

$action = $_GET['action'];

if ($action === 'index') {
    $controller->index();
} else if ($action == 'show') {
    $controller->show();
}

// remove php closing tag as per psr if file contain only php remove php closing tag