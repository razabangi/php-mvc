<?php
namespace Framework;

use ReflectionMethod;

class Dispatcher
{
    public function __construct(private Router $router)
    {
        //
    }

    public function handle(string $path) {
        if ($segments = $this->router->match($path)) {
        } else {
            exit("No route found.");
        }
        
        // front controller
        $action = $segments['action'] ?? 'index'; // show
        $controller = "App\Controllers\\" . ucwords($segments["controller"]);
        $controllerObj = new $controller;
        $args = $this->getActionArguments($controller, $action, $segments);
        $controllerObj->$action(...$args);
    }

    private function getActionArguments(string $controller, string $action, array $params): array {
        $args = [];
        $method = new ReflectionMethod($controller, $action);
        foreach ($method->getParameters() as $key => $parameter) {
            $name = $parameter->getName();

            $args[$name] = $params[$name];
        }

        return $args;
    }
}