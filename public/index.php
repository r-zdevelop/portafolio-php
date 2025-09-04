<?php 

require __DIR__ . '/../bootstrap.php';

use Framework\Database;
use Framework\Router;

$db = new Database();

$router = new Router();

require __DIR__ . '/../routes/web.php';

$router->run();