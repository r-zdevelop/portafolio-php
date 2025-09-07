<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
    public function index()
    {
        $title = 'Inicio';
        $db = db();
        
        // Fetch recent posts for the homepage
        $posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 6')->get();

        view('home', ['title' => $title, 'posts' => $posts]);
    }
}
