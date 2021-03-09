<?php

use App\Models\Article;
use App\View\View;

require __DIR__ . '/autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $view = new View();
    $article = Article::findById($_GET['id']);
    if (!empty($article)) {
        $view->article = $article;
        $view->display(__DIR__ . '/App/Templates/article.php');
    }
}
