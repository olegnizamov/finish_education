<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
</head>
<body>

<?php
include __DIR__ . '/functions.php';
$arrPict = getArrayPictures();
foreach ($arrPict as $key => $picture) { ?>
    <div>
        <a href="/lesson6/gallery/image.php?name=<?php echo $picture; ?>">
            <img src="/lesson6/gallery/img/<?php echo $picture; ?>">
        </a>
    </div>
<?php } ?>

<? if (null !== getCurrentUser()) { ?>
    <form action="/lesson6/gallery/upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="picture">
        <button type="submit">Отправить</button>
    </form>
<? } ?>

</body>
</html>
