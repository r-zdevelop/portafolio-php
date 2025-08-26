<?php

class PostController
{
    public function index()
    {
        $title = 'Blog';
        $db = new Database();
        $links = $db->query('SELECT * FROM posts ORDER BY id DESC')->get();

        require __DIR__ . '/../../resources/links.template.php';
    }

    public function show()
    {
        $title = 'Blog';

        $id = $_GET['id'] ?? null;

        $db = new Database();
        $post = $db
            ->query('SELECT * FROM posts WHERE id = :id', ['id' => $id])
            ->firstOrFail();

        require __DIR__ . '/../../resources/post.template.php';
    }

    public function store()
    {
        
    }
}
