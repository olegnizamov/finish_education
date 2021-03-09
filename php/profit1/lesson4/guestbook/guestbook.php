<?php include __DIR__ . '/function.php'; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
<div>
    <?php
    $arrLines = getData();
    foreach ($arrLines as $stringElement) {
        echo $stringElement . '<br>';
    };
    ?>
</div>

<div>
    <form action="/lesson4/guestbook/add.php" method="POST">
        <input type="text" name="text" size="40">
        <button type="submit">Отправить</button>
    </form>
</div>

</body>
</html>
