<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>страница загрузки</title>
</head>
<body>
<?php
require_once __DIR__ . '/functions.php';
if (isset($_FILES['picture'])) {
    if (null === getCurrentUser()) {
        echo 'Пользователь не авторизован - дальнейшая работа программы недопустима';
    } else {
        if (0 === $_FILES['picture']['error']) {
            if ('image/jpeg' == $_FILES['picture']['type'] || 'image/png' == $_FILES['picture']['type']) {
                /** Проверяем, что такого файла нет в системе */
                $arrPict = getArrayPictures();
                if (!in_array($_FILES['picture']['name'], $arrPict)) {
                    move_uploaded_file(
                        $_FILES['picture']['tmp_name'],
                        __DIR__ . '/img/' . $_FILES['picture']['name']);

                    /** добавляем логирование в проект */
                    $log = getCurrentUser() . ';' . date('d.m.Y') . ';' . $_FILES['picture']['name'];
                    file_put_contents(__DIR__ . '/log_test.txt', $log . "\n", FILE_APPEND | LOCK_EX);
                    echo 'Файл успешно загружен!';
                } else {
                    echo 'Файл с заданным именем уже загружен в систему!';
                }
            } else {
                echo 'Формат не поддерживается!';
            }
        }
    }
}
?>

<a href="/lesson5/index.php"><= Назад</a>
</body>
