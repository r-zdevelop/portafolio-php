<?php

class Router
{
    protected $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }
    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            exit('Route not found ' . $method . ' ' . $uri);
        }

        [$controller, $method] = $action;

        (new $controller())->$method();
    }
}
