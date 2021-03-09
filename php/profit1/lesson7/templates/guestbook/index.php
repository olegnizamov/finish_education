<html>
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
<div>
    <?php
    $guestBook = $this->getData('guestbook');
    foreach ($guestBook->getAllRecords() as $stringElement) {
        echo $stringElement->getMessage() . '<hr>';
    };
    ?>
</div>
<div>
    <form action="/lesson7/guestadd.php" method="POST">
        <input type="text" name="text" size="40">
        <button type="submit">Отправить</button>
    </form>
</div>
</body>
</html>
