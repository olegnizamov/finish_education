<?php
require __DIR__ . '/app/View.php';

session_start();
require_once __DIR__ . '/functions.php';

if (null !== getCurrentUser()) {
    header('Location: /lesson7/index.php');
    exit;
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if (checkPassword($_POST['login'], $_POST['password'])) {
        $_SESSION['login'] = $_POST['login'];
        header('Location: /lesson7/index.php');
        exit;
    }
}

$view = new View();
$view->display(__DIR__ . '/templates/gallery/login.php');
