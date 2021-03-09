<?php
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/app/News.php';

$news = new News();
$view = new View();

if (!empty($_GET['id'])) {
    $view->assign('article', $news->getArticle($_GET['id']));
    $view->display(__DIR__ . '/templates/article.php');
} else {
    echo 'Некорректно переданные данные';
}
