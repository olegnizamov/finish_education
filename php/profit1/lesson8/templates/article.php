<html>
<head>
    <meta charset="UTF-8">
    <title>Детальная страница</title>
</head>
<body>
<div>
    <?php
    $article = $this->getData('article');
    if (!empty($article)) {
        echo $article->getHeader() . '<br>';
        echo '<div>' . $article->getText() . '</div>';
        echo '<div>Автор: ' . $article->getAuthor() . '</div>';
    } else {
        echo 'Записи с данным id не существует<br>';
    }
    ?>
</div>
</body>
</html>
