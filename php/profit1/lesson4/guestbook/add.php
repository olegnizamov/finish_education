<?php
include __DIR__ . '/function.php';



if (isset($_POST['text'])) {
    /** Читаем данные из файла */
    $arrLines = getData();
    /** В прочитанный массив данных добавляем новый элемент(удаляя из него служебные символы) */
    $arrLines[] = trim($_POST['text']);
    /** Записываем данные в файл (перезаписываем файл) */
    $res = implode(PHP_EOL, $arrLines);
    file_put_contents(__DIR__ .'/bd.txt', $res);
}

header('Location: /lesson4/guestbook/index.php');
exit;
