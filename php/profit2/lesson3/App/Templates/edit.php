<html>
<head>
    <meta charset="UTF-8">
    <title>редактировать/добавить новость</title>
</head>
<body>
<div class="container">
    <?php
    if (!empty($this->article)) {
        ?>
        <h1>Редактировать новость</h1>
        <form action="/admin/save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $this->article->id; ?>">
            <input type="text" name="title" value="<?php echo $this->article->title; ?>"><br><br>
            <textarea name="contents" cols="30" rows="10"><?php echo $this->article->contents; ?></textarea><br><br>
            <button type="submit">Редактировать</button>
        </form>
        <?php
    } ?>
</div>
</body>
</html>
