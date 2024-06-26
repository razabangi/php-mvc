<?php
namespace Framework;

use ReflectionClass;
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
        $action = $this->getActionName($segments);
        $controller = $this->getControllerName($segments);

        $controllerObj = $this->getObject($controller);
        $args = $this->getActionArguments($controller, $action, $segments);
        $controllerObj->$action(...$args);
    }

    private function getActionArguments(string $controller, string $action, array $params): array {
        $args = [];
        $method = new ReflectionMethod($controller, $action);
        foreach ($method->getParameters() as $parameter) {
            $name = $parameter->getName();

            $args[$name] = $params[$name];
        }

        return $args;
    }

    private function getControllerName($params) {
        $controller = $params['controller'];
        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));
        $namespace = "App\Controllers";

        if (array_key_exists('namespace', $params)) {
            $namespace .= "\\" . $params['namespace'];
        }
        
        return $namespace . "\\" . $controller;
    }

    private function getActionName($params) {
        $action = $params['action'];
        $action = lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));

        return $action;
    }

    private function getObject(string $className) {
        $reflector = new ReflectionClass($className);
        $constructor = $reflector->getConstructor();
        $dependencies = [];
        if ($constructor === null) {
            return new $className;
        }

        foreach ($constructor->getParameters() as $key => $parameter) {
            $type = (string) $parameter->getType();
            $dependencies[] = $this->getObject($type);
        }

        return new $className(...$dependencies);
    }
}