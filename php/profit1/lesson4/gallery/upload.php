<html>
<head>
    <meta charset="UTF-8">
    <title>страница загрузки</title>
</head>
<body>
<?php
if (isset($_FILES['picture'])) {
    if (0 === $_FILES['picture']['error']) {
        if ('image/jpeg' == $_FILES['picture']['type'] || 'image/png' == $_FILES['picture']['type']) {

            /** Проверяем, что такого файла нет в системе */
            include __DIR__ . '/function.php';
            $arrPict = getArrayPictures();
            if (!in_array($_FILES['picture']['name'], $arrPict)) {
                move_uploaded_file(
                    $_FILES['picture']['tmp_name'],
                    __DIR__ . '/img/' . $_FILES['picture']['name']);
                echo 'Файл успешно загружен!';
            } else {
                echo 'Файл с заданным именем уже загружен в систему!';
            }
        } else {
            echo 'Формат не поддерживается!';
        }
    }
}
?>
</body>
</html>
