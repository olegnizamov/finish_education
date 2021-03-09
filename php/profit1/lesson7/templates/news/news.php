<html>
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<div>
    <?php
    $news = $this->getData('news');
    foreach ($news->getAllArticles() as $article) { ?>
        <a href="/lesson7/article.php?id=<?php echo $article->getId(); ?>"><?php echo $article->getTitle(); ?></a><br>
        <div><?php echo $article->getDescription() ?></div>
        <hr>
    <? }; ?>
</div>
</body>
</html>
