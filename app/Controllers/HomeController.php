<?php

class HomeController
{
    public function index()
    {
        $title = 'Inicio';
        $db = new Database();
        
        // Fetch recent posts for the homepage
        $posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 6')->get();

        require __DIR__ . '/../../resources/home.template.php';
    }
}
