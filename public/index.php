<?php 

require __DIR__ . '/../framework/Database.php';

$db = new Database();

$routes = require __DIR__ . '/../routes/web.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = $routes[$requestUri] ?? null;

if ($route) {
    require __DIR__ . '/../' . $route;
} else {
    echo $route;
    exit('404 Not Found');
}