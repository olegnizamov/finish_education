<html>
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
</head>
<body>

<?php
$arrPict = $this->getData('gallery');
foreach ($arrPict as $key => $picture) { ?>
    <div>
        <a href="/lesson7/image.php?name=<?php echo $picture; ?>">
            <img src="/lesson7/img/<?php echo $picture; ?>">
        </a>
    </div>
<?php } ?>

<? if (null !== getCurrentUser()) { ?>
    <form action="/lesson7/upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="picture">
        <button type="submit">Отправить</button>
    </form>
<? } ?>

</body>
</html>
