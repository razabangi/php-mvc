<?php

namespace Framework;

class Viewer
{
    public function render(string $templete, array $data = []) {
        extract($data);
        require("./resources/views/$templete");
    }
}