<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Тестовая страница</title>
</head>
<body>

<div class="container">

    <h1>Статьи</h1>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Текст</th>
            <th>Автор</th>
        </tr>
        <?php foreach ($this->news as $article) : ?>
            <tr>
                <td><a href="/ARTICLE?id=<?php echo $article->id; ?>"><?php echo $article->id; ?></a></td>
                <td><?php echo $article->title; ?></td>
                <td><?php echo $article->contents; ?></td>
                <?php if (isset($article->author->name)): ?>
                    <td><?php echo $article->author->name; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>
</html>
<?php echo $this->resourceUsageFormatter->resourceUsage($this->timer->stop());?>
