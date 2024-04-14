<?php

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $path, array $params = []): void {
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
        $path = trim($path, "/");
        // $pattern = "#/home/index#"; // match when /home/index but also match when /admin/home/index123
        // $pattern = "#^/home/index#"; // match when /home/index but not match when /admin/home/index123 because of start of string ^ but its also correct for /home/index123
        // $pattern = "#^/home/index$#"; // match when /home/index but not not match for /admin/home/index123 or /home/index123 because of end of string $
        
        foreach ($this->routes as $key => $route) {
            // $pattern = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#"; // allow /products/index, /products/show, /home/index etc
            // echo $pattern . "\n" . $route['path'];
            $pattern = $this->getPatternFromRoute($route['path']);
            if (preg_match($pattern, $path, $matches)) {
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
                $params = array_merge($matches, $route['params']);
                
                return $params;
            }
        }

        return false;
    }

    private function getPatternFromRoute(string $routePath): string {
        $routePath = trim($routePath, "/");
        $segments = explode("/", $routePath);

        $segments = array_map(function($segment): string {
            if (preg_match("#^\{([a-z][a-z0-9]*)\}$#", $segment, $matches)) {
                $segment = "(?<" . $matches[1] . ">[^/]*)";
            }
            if (preg_match("#^\{([a-z][a-z0-9]*):(.+)\}$#", $segment, $matches)) {
                $segment = "(?<" . $matches[1] . ">" . $matches[2] . ")";
            }

            return $segment;
        }, $segments);

        return "#^" . implode("/", $segments) . "$#";
    }
}