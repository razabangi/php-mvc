<?php
namespace Framework;

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
        $controllerObj->$action($segments['id']);
    }
}