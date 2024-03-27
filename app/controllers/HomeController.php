<?php

namespace app\Controllers;

class HomeController {
    public function index() {
        require('./resources/views/index.php');
    }
}