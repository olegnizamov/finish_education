<?php
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/app/News.php';

$news = new News();
$view = new View();

if (!empty($_GET['id']) && key_exists($_GET['id'], $news->getAllArticles())) {
    $view->assign('article', $news->getArticle($_GET['id']));
    $view->display(__DIR__ . '/templates/news/article.php');
} else {
    echo 'Новости с заданным id не существует';
}


