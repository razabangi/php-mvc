<?php

namespace Framework;

class Viewer
{
    public function render(string $templete, array $data = []) {
        extract($data, EXTR_SKIP);

        ob_start();
        require("./resources/views/$templete");
        return ob_get_clean();
    }
}