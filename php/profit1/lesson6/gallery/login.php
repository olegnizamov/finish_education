<?php session_start();
require_once __DIR__ . '/functions.php';

if (null !== getCurrentUser()) {
    header('Location: /lesson6/gallery/index.php');
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if (true === checkPassword($_POST['login'], $_POST['password'])) {
        $_SESSION['login'] = $_POST['login'];
        header('Location: /lesson6/gallery/index.php');
    }
} ?>

<!doctype html>
<html lang="en">
<head>
    <title>Авторизация</title>
</head>
<body>
<form action="/lesson6/gallery/login.php" method="post">
    <input type="text" name="login" id="login-field" placeholder="Ваш логин">
    <input type="password" name="password" id="password-field" placeholder="Ваш пароль">
    <input type="submit" value="Войти">
</form>
</body>
</html>
