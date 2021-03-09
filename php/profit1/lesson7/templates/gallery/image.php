<html>
<head>
    <meta charset="UTF-8">
    <title>детальная страница</title>
</head>
<body>
<div>
    <?php
    $picture = $this->getData('images');
    ?>
    <img src="/lesson7/img/<?php echo $picture; ?>">
</div>
<div>
    <a href="/lesson7/index.php"><= Назад</a>
</div>
</body>
