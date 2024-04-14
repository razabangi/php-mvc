<?php

namespace Framework;

class Viewer
{
    public function render(string $templete, array $products = []) {
        require("./resources/views/$templete");
    }
}