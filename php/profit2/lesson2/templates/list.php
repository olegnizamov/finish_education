<html>
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<div>
    <?php
    foreach ($data as $article) { ?>
        <?php echo $article->title; ?><br>
        <div><?php echo $article->contents ?></div>
        <a href="/admin/delete.php?id=<?php echo $article->id; ?>">Удалить статью</a><br>
        <a href="/admin/edit.php?id=<?php echo $article->id; ?>">Изменить статью</a><br>
        <hr>
    <?php }; ?>
</div>
<a href="/admin/edit.php">Добавить статью</a><br>
</body>
</html>
