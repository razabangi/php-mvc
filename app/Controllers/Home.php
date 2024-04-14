<?php

namespace app\Controllers;

class Home {
    public function index() {
        require('./resources/views/index.php');
    }
}