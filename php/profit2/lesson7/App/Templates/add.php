<html>
<head>
    <meta charset="UTF-8">
    <title>редактировать/добавить новость</title>
</head>
<body>
<div class="container">
    <h1>Добавить новость</h1>
    <form action="/ADMIN/SAVE" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value=""><br><br>
        <textarea name="contents" cols="30" rows="10"></textarea><br><br>
        <button type="submit">Добавить</button>
    </form>
</div>
<?php echo $this->timer;?>
</body>
</html>
