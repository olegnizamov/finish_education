<?php
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/app/News.php';


$news = new News();
$view = new View();
$view->assign('news',$news);
$view->display(__DIR__ . '/templates/news/news.php');
