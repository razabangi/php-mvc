<?php

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $path, array $params): void {
        $this->routes[] = [
            'path' => $path,
            'params' => $params
        ];
    }

    public function __invoke()
    {
        return $this->routes;   
    }

    public function match(string $path): array|bool {
        // $pattern = "#/home/index#"; // match when /home/index but also match when /admin/home/index123
        // $pattern = "#^/home/index#"; // match when /home/index but not match when /admin/home/index123 because of start of string ^ but its also correct for /home/index123
        // $pattern = "#^/home/index$#"; // match when /home/index but not not match for /admin/home/index123 or /home/index123 because of end of string $
        $pattern = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#"; // allow /products/index, /products/show, /home/index etc
        if (preg_match($pattern, $path, $matches)) {
            $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
            
            return $matches;
        }

        // foreach ($this->routes as $route) {
        //     if ($path == $route['path']) {
        //         return $route['params'];
        //     }
        // }

        return false;
    }
}