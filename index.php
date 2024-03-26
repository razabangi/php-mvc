<?php

require('./model.php');

$product = new Model();
$products = $product->getData();

require('./view.php');

// remove php closing tag as per psr if file contain only php remove php closing tag