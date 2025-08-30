<?php

class Router
{
    protected $routes = [];

    public function __construct()
    {
        $this->loadRoutes('web');
    }

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }
    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function delete($uri, $action)
    {
        $this->routes['DELETE'][$uri] = $action;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            exit('Route not found ' . $method . ' ' . $uri);
        }

        [$controller, $method] = $action;

        (new $controller())->$method();
    }

    public function loadRoutes(string $file)
    {
        $router = $this;
        
        $filePath = __DIR__ . '/../routes/' . $file . '.php';

        return $filePath;
    }
}
