<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (!empty($_POST)) {
    if (isset($_POST['id'])) {
        $article = Article::findById($_POST['id']);
    } else {
        $article = new Article();
    }
    $article->title = $_POST['title'] ?? '';
    $article->contents = $_POST['contents'] ?? '';
    $article->save();
}
header('Location: /admin/');
exit;
