<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $article = Article::findById($_GET['id']);
    if (!empty($article)) {
        $article->delete();
    }
    header('Location: /admin/');
    exit;
} else {
    echo 'Статьи не существует!';
}
