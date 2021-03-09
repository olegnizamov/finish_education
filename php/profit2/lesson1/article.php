<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$article = Article::findById($_GET['id']);
if (!empty($article)) {
    include __DIR__ . '/templates/article.php';
} else {
    header("HTTP/1.0 404 Not Found");
}
