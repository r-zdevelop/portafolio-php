<?php

require __DIR__ . '/../app/Controllers/AboutController.php';
require __DIR__ . '/../app/Controllers/HomeController.php';
require __DIR__ . '/../app/Controllers/PostController.php';
require __DIR__ . '/../app/Controllers/LinkController.php';

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [AboutController::class, 'index']);
$router->get('/journal', [PostController::class, 'show']);

$router->get('/links', [LinkController::class, 'index']);
$router->get('/links/create', [LinkController::class, 'create']);
$router->post('/links/store', [LinkController::class, 'store']);
$router->delete('/links/delete', [LinkController::class, 'delete']);