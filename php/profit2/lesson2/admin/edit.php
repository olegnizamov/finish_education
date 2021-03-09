<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $article = Article::findById($_GET['id']);
    if (!empty($article)) {
        include __DIR__ . '/../templates/edit.php';
    }
} else {
    include __DIR__ . '/../templates/add.php';
}

