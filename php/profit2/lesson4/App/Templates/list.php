<html>
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<div>
    <?php
    foreach ($this->news as $article) { ?>
        <?php echo $article->title; ?><br>
        <div><?php echo $article->contents ?></div>
        <a href="/ADMIN/DELETE?id=<?php echo $article->id; ?>">Удалить статью</a><br>
        <a href="/ADMIN/EDIT?id=<?php echo $article->id; ?>">Изменить статью</a><br>
        <hr>
    <?php }; ?>
</div>
<a href="/ADMIN/EDIT">Добавить статью</a><br>
</body>
</html>
