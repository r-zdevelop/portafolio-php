<?php

$title = 'Journal';

$id = $_GET['id'] ?? null;

$post = $db
    ->query('SELECT * FROM posts WHERE id = :id', ['id' => $id])
    ->firstOrFail();

require __DIR__ . '/../../resources/journal.template.php';