<?php include __DIR__ . '/../class/GuestBook.php'; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
<div>
    <?php
    $guestBook = new GuestBook(__DIR__ . '/bd.txt');
    foreach ($guestBook->getData() as $stringElement) {
        echo $stringElement . '<hr>';
    };
    ?>
</div>

<div>
    <form action="/lesson6/guestbook/add.php" method="POST">
        <input type="text" name="text" size="40">
        <button type="submit">Отправить</button>
    </form>
</div>
</body>
</html>
