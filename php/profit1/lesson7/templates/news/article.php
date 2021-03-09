<html>
<head>
    <meta charset="UTF-8">
    <title>Детальная страница</title>
</head>
<body>
<div>
    <?php
    $article = $this->getData('article');
    ?>
    <?php echo $article->getTitle(); ?><br>
    <div><?php echo $article->getDetailText() ?></div>
    <hr>
</div>
</body>
</html>
