<?php

namespace app\Controllers;

use Framework\Viewer;

class Home {
    public function index() {
        $viewer = new Viewer();
        echo $viewer->render('shared/header.php');
        echo $viewer->render('index.php');
        echo $viewer->render('shared/footer.php');
    }
}