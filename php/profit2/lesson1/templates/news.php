<html>
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<div>
    <?php
    foreach ($data as $article) { ?>
        <a href="/article.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a><br>
        <div><?php echo $article->contents ?></div>
        <hr>
    <?php }; ?>
</div>
</body>
</html>
