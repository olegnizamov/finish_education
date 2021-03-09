<?php

use App\Models\Article;
use App\View\View;

require __DIR__ . '/../autoload.php';

$view = new View();


if (isset($_GET['id'])) {
    $article = Article::findById($_GET['id']);
    if (!empty($article)) {
        $view->article = $article;
        $view->display(__DIR__ . '/../App/Templates/edit.php');
    }
} else {
    $view->display(__DIR__ . '/../App/Templates/add.php');
}
