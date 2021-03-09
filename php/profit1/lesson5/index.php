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
        <a href="/lesson5/image.php?name=<?php echo $picture; ?>">
            <img src="/lesson5/img/<?php echo $picture; ?>">
        </a>
    </div>
<?php } ?>

<? if (null !== getCurrentUser()) { ?>
    <form action="/lesson5/upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="picture">
        <button type="submit">Отправить</button>
    </form>
<? } ?>

</body>
</html>
