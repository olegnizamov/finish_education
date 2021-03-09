<html>
<head>
    <meta charset="UTF-8">
    <title>детальная страница</title>
</head>
<body>
<div>
    <?php
    $arrPict = include __DIR__ . '/source.php';
    if (!empty($_GET['id']) && array_key_exists($_GET['id'], $arrPict)) {
        echo '<img src="/lesson3/gallery/img/' . $arrPict[$_GET['id']] . '">';
    } else {
        echo 'Картинки с заданным id не существует';
    }
    ?>
</div>
</body>
