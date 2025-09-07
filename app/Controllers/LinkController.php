<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validator;

class LinkController
{
    public function index()
    {
        $title = 'Proyectos';
        $db = new Database();
        $links = $db->query('SELECT * FROM links ORDER BY id DESC')->get();

        view('links', ['title' => $title, 'links' => $links]);
    }

    public function create()
    {
        $title = 'Crear Proyecto';

        view('links-create', ['title' => $title]);
    }

    public function store()
    {
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

        view('links-create', ['title' => 'Crear Proyecto', 'errors' => $errors ?? []]);
    }

    public function edit()
    {
        $title = 'Editar Proyecto';

        $db = new Database();
        $id = $_GET['id'] ?? null;

        $project = $db->query('SELECT * FROM links WHERE id = :id', ['id' => $id])->firstOrFail();

        view('links-edit', ['title' => $title, 'project' => $project]);
    }

    public function update()
    {
        require_once __DIR__ . '/../../framework/Validator.php';

        $db = new Database();
        $id = $_GET['id'] ?? null;

        $project = $db->query('SELECT * FROM links WHERE id = :id', ['id' => $id])->firstOrFail();
        $title = 'Editar Proyecto';

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

                $db->query('UPDATE links SET title = :title, url = :url, description = :description WHERE id = :id', [
                    'id' => $id,
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

        view('links-edit', ['title' => $title, 'project' => $project, 'errors' => $errors ?? []]);
    }

    public function delete()
    {
        $db = new Database();
        $id = $_POST['id'] ?? null;
        if ($id) {
            $db->query('DELETE FROM links WHERE id = :id', ['id' => $id]);
        }
        header('Location: /links');
        exit;
    }
}
