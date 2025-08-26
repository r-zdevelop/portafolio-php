<?php 

require __DIR__ . '/../framework/Database.php';
require __DIR__ . '/../framework/Router.php';

$db = new Database();

$router = new Router();

require __DIR__ . '/../routes/web.php';

$router->run();