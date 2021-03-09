<html>
<head>
    <meta charset="UTF-8">
    <title>детальная страница</title>
</head>
<body>
<div>
    <?php
    include __DIR__ . '/function.php';
    $arrPict = getArrayPictures();
    if (!empty($_GET['name']) && in_array($_GET['name'], $arrPict)) {
        echo '<img src="/lesson4/gallery/img/' . $_GET['name'] . '">';
    } else {
        echo 'Картинки с заданным именем не существует';
    }
    ?>
</div>
</body>
