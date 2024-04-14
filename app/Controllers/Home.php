<?php

namespace app\Controllers;

use Framework\Viewer;

class Home {
    public function __construct(private Viewer $viewer)
    {
        
    }

    public function index() {
        echo $this->viewer->render('shared/header.php', [
            'title' => 'Home'
        ]);
        echo $this->viewer->render('index.php');
        echo $this->viewer->render('shared/footer.php');
    }
}