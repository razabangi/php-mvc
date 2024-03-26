<?php

require('./app/controllers/ProductController.php');

$controller = new ProductController();
$controller->index();

// remove php closing tag as per psr if file contain only php remove php closing tag