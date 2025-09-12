<?php

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\PostController;
use App\Controllers\LinkController;
use Framework\Middleware\Authenticated;

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [AboutController::class, 'index']);
$router->get('/journal', [PostController::class, 'show']);

$router->get('/links', [LinkController::class, 'index']);
$router->get('/links/create', [LinkController::class, 'create'], Authenticated::class);
$router->post('/links/store', [LinkController::class, 'store']);
$router->get('/links/edit', [LinkController::class, 'edit'], Authenticated::class);
$router->put('/links/update', [LinkController::class, 'update']);
$router->delete('/links/delete', [LinkController::class, 'delete']);