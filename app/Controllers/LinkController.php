<?php

class LinkController
{
    public function index()
    {
        $title = 'Proyectos';
        $db = new Database();
        $links = $db->query('SELECT * FROM links ORDER BY id DESC')->get();

        require __DIR__ . '/../../resources/links.template.php';
    }

    public function create()
    {
        $title = 'Crear Proyecto';

        require __DIR__ . '/../../resources/links-create.template.php';
    }

    public function store()
    {
        require_once __DIR__ . '/../../framework/Validator.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator($_POST, [
                'title'         => 'required|min:3|max:255',
                'url'           => 'required|url|max:190',
                'description'   => 'required|min:3|max:500'
            ]);


            if ($validator->passes()) {
                $title = $_POST['title'] ?? '';
                $url = $_POST['url'] ?? '';
                $description = $_POST['description'] ?? '';
                $db = new Database();
                $db->query('INSERT INTO links (title, url, description) VALUES (:title, :url, :description)', [
                    'title' => $title,
                    'url' => $url,
                    'description' => $description
                ]);

                // Redirigir o mostrar un mensaje de éxito
                header('Location: /links');
                exit;
            } else {
                $errors = $validator->errors();
            }
        }

        require __DIR__ . '/../../resources/links-create.template.php';
    }
}
