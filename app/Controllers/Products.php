<?php

namespace app\Controllers;

use app\Models\Product;

class Products {
    public function index() {
        $product = new Product();
        $products = $product->getData();

        require('./resources/views/products/index.php');
    }

    public function show(string $id) {
        echo $id;
        require('./resources/views/products/show.php');
    }
}