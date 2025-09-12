<?php

namespace Framework\Middleware;

class Authenticated implements MiddlewareInterface
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            redirect('/login');
            exit();
        }
    }
}