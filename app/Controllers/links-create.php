<?php

$title = 'Proyectos';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $description = $_POST['description'] ?? '';

    $errors = [];
    if (empty($title)) {
        $errors[] = 'El título es obligatorio.';
    }
    if (empty($url)) {
        $errors[] = 'La URL es obligatoria.';
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = 'La URL no es válida.';
    }
    if (empty($description)) {
        $errors[] = 'La descripción es obligatoria.';
    }
    if (empty($errors)) {
        // Aquí podrías agregar la lógica para guardar el enlace en la base de datos
        $db->query('INSERT INTO links (title, url, description) VALUES (:title, :url, :description)', [
            'title' => $title,
            'url' => $url,
            'description' => $description
        ]);

        // Redirigir o mostrar un mensaje de éxito
        header('Location: /links');
        exit;
    }
}

require __DIR__ . '/../../resources/links-create.template.php';