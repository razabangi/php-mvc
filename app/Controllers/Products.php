<?php

namespace app\Controllers;

use app\Models\Product;
use Framework\Viewer;

class Products {
    public function index() {
        $product = new Product();
        $products = $product->getData();
        $viewer = new Viewer();
        $viewer->render('products/index.php', $products);
    }

    public function show(string $id) {
        echo $id;
        require('./resources/views/products/show.php');
    }

    public function someExample(string $title, string $id) {
        echo $title . " " . $id . " example method";
    }
}