<?php

/**1. Напишите программу-калькулятор
 * Форма для ввода двух чисел, выбора знака операции и кнопка "равно"
 * Данные пусть передаются методом GET из формы (да, можно и так!)
 * на скрипт, который их примет и выведет выражение и его результат
 * Попробуйте улучшить программу. Пусть данные отправляются на ту же страницу на PHP,
 * введенные числа останутся в input-ах, а результат появится после кнопки "равно"
 */
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>
<?php

$arrOperations = [
    '+',
    '-',
    '*',
    '/',
];

$a = null;
$b = null;
$action = null;

/** Проверяем что в массиве $_GET с ключом a передано значение и значение является числом */
if (isset($_GET['a']) && is_numeric($_GET['a'])) {
    $a = $_GET['a'];
}
/** Проверяем что в массиве $_GET с ключом b передано значение и значение является числом */
if (isset($_GET['b']) && is_numeric($_GET['b'])) {
    $b = $_GET['b'];
}
/** Проверяем что в массиве $_GET с ключом action передано значение */
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

function calc($a, $b, string $action)
{
    switch ($action) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if (0 === (int)$b) {
                return 'На ноль делить нельзя';
            }
            return $a / $b;

        default:
            return 'Некорректная операция';
    }
}

assert(calc(9, 9, '') == 'Некорректная операция');
assert(calc(9, 4, 'ffff') == 'Некорректная операция');
assert(calc(1, 1, '+') == 2);
assert(calc(1, 1, '-') == 0);
assert(calc(2, 2, '*') == 4);
assert(calc(2, 2, '/') == 1);
assert(calc(2, 1, '/') == 2);
assert(calc(2, 0, '/') == 'На ноль делить нельзя');
assert(calc(4, 3, '/') == (4 / 3));
assert(calc(4.0, 0.0, '/') == 'На ноль делить нельзя');

?>

<form action="/lesson3/calc.php" method="GET">
    <input type="text" name="a" value="<?= $a ?>">
    <select name="action">
        <option value=""></option>
        <? foreach ($arrOperations as $operation) {
            ?>
            <option value=<?= $operation ?>
                <?php if ($operation === $action) {
                    echo 'selected';
                };
                ?>>
                <?php echo $operation; ?>
            </option>
            <?
        }
        ?>
    </select>
    <input type="text" name="b" value="<?= $b ?>"">
    <button> =</button>
</form>

<?
if (!empty($a) && !empty($b) && !empty($action)) {
    echo calc($a, $b, $action);
}
?>


</body>
</html>
