<?php 

$routes = require __DIR__ . '/../routes/web.php';

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

$route = $routes[$requestUri] ?? null;

if ($route) {
    require __DIR__ . '/../' . $route;
} else {
    echo $route;
    exit('404 Not Found');
}