<?php

namespace app\Controllers;

use app\Models\Product;
use Framework\Viewer;

class Products {
    public function index() {
        $product = new Product();
        $products = $product->getData();
        $viewer = new Viewer();
        echo $viewer->render('shared/header.php', [
            'title' => 'Products | MVC'
        ]);
        echo $viewer->render('products/index.php', [
            'products' => $products
        ]);
        echo $viewer->render('shared/footer.php');
    }

    public function show(string $id) {
        $viewer = new Viewer();
        echo $viewer->render('shared/header.php', [
            'title' => 'Products | Single'
        ]);
        echo $viewer->render('products/show.php', [
            'id' => $id
        ]);
        echo $viewer->render('shared/footer.php');
    }

    public function someExample(string $title, string $id) {
        echo $title . " " . $id . " example method";
    }
}