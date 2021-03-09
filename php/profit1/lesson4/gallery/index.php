<?php
/**
 * 1 На основе кода, изученного на уроке, сделайте простейшую фотогалерею:
 *     Скрипт, который выводит в браузер изображения из определенной папки на сервере
 *     Форма и скрипт загрузки нового изображения в эту папку
 * 2 Решите задачу загрузки файла от пользователя в заданное место на сервере с тем же именем файла,
 * что он имел на компьютере пользователя.
 * 3 Решите задачу ограничения загрузки, например - только файлов JPEG и PNG
 */
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
</head>
<body>

<?php
include __DIR__ . '/function.php';
$arrPict = getArrayPictures();
foreach ($arrPict as $key => $picture) { ?>
    <div>
        <a href="/lesson4/gallery/image.php?name=<?= $picture; ?>">
            <img src="/lesson4/gallery/img/<?= $picture; ?>">
        </a>
    </div>
<?php } ?>

<form action="/lesson4/gallery/upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="picture">
    <button type="submit">Отправить</button>
</form>

</body>
</html>
