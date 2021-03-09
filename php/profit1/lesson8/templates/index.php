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
        <a href="/lesson8/article.php?id=<?php echo $article->getId(); ?>"><?php echo $article->getHeader(); ?></a><br>
        <div><?php echo $article->getText() ?></div>
        <div>Автор: <?php echo $article->getAuthor() ?></div>
        <hr>
    <?php }; ?>
</div>
</body>
</html>
