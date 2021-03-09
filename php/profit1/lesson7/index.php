<?php
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/functions.php';

session_start();

$arrPict = getArrayPictures();

$view = new View();
$view->assign('gallery', $arrPict);
$view->display(__DIR__ . '/templates/gallery/index.php');
