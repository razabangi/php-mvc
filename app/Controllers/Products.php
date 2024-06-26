<?php

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products {
    public function __construct(private Viewer $viewer, private Product $product)
    {
        
    }

    public function index() {
        $products = $this->product->getData();
        echo $this->viewer->render('shared/header.php', [
            'title' => 'Products | MVC'
        ]);
        echo $this->viewer->render('products/index.php', [
            'products' => $products
        ]);
        echo $this->viewer->render('shared/footer.php');
    }

    public function show(string $id) {
        echo $this->viewer->render('shared/header.php', [
            'title' => 'Products | Single'
        ]);
        echo $this->viewer->render('products/show.php', [
            'id' => $id
        ]);
        echo $this->viewer->render('shared/footer.php');
    }

    public function someExample(string $title, string $id) {
        echo $title . " " . $id . " example method";
    }
}