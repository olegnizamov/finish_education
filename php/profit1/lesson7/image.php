<?php
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/functions.php';

session_start();
$arrPict = getArrayPictures();
if (!empty($_GET['name']) && in_array($_GET['name'], $arrPict)) {
    $imageName = $_GET['name'];
    $view = new View();
    $view->assign('images', $imageName);
    $view->display(__DIR__ . '/templates/gallery/image.php');
}else {
    echo 'Картинки с заданным именем не существует';
}



