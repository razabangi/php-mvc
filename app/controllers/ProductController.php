<?php

class ProductController {
    public function index() {
        require('./app/models/Product.php');

        $product = new Product();
        $products = $product->getData();

        require('./resources/views/products/index.php');
    }

    public function show() {
        require('./resources/views/products/show.php');
    }
}