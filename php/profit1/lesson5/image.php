<html>
<head>
    <meta charset="UTF-8">
    <title>детальная страница</title>
</head>
<body>
<div>
    <?php
    include __DIR__ . '/functions.php';
    $arrPict = getArrayPictures();
    if (!empty($_GET['name']) && in_array($_GET['name'], $arrPict)) {
        echo '<img src="/lesson5/img/' . $_GET['name'] . '">';
    } else {
        echo 'Картинки с заданным именем не существует';
    }
    ?>
</div>


<div>
    <a href="/lesson5/index.php"><= Назад</a>
</div>
</body>
