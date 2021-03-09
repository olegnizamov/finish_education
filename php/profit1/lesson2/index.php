<?php
/**
 * 1. Напишите программу, которая составит и выведет в браузер таблицу истинности для логических
 * операторов &&, || и xor.
 */
?>
Таблица истинности
<table>
    <tr>
        <th>&&</th>
        <th>0</th>
        <th>1</th>
    </tr>
    <tr>
        <th>0</th>
        <td><?php echo (int)(false && false); ?></td>
        <td><?php echo (int)(false && true); ?></td>
    </tr>
    <tr>
        <th>1</th>
        <td><?php echo (int)(true && false); ?></td>
        <td><?php echo (int)(true && true); ?></td>
    </tr>
</table>
<table>
    <tr>
        <th class="column1">||</th>
        <th>0</th>
        <th>1</th>
    </tr>
    <tr>
        <th>0</th>
        <td><?php echo (int)(false || false); ?></td>
        <td><?php echo (int)(false || true); ?></td>
    </tr>
    <tr>
        <th>1</th>
        <td><?php echo (int)(true || false); ?></td>
        <td><?php echo (int)(true || true); ?></td>
    </tr>
</table>
<table>
    <tr>
        <th class="column1">xor</th>
        <th>0</th>
        <th>1</th>
    </tr>
    <tr>
        <th>0</th>
        <td><?php echo (int)(false xor false); ?></td>
        <td><?php echo (int)(false xor true); ?></td>
    </tr>
    <tr>
        <th>1</th>
        <td><?php echo (int)(true xor false); ?></td>
        <td><?php echo (int)(true xor true); ?></td>
    </tr>
</table>

<?php
/**
 * 2. Составьте функцию вычисления дискриминанта квадратного уравнения. Покройте ее тестами. Используя эту функцию,
 * напишите программу, которая решает квадратное уравнение. Оформите красивый вывод решения.
 *
 * Метод решения квадратного уравнения ax^2+bx+c=0
 * @param int $a Параметр a
 * @param int $b Параметр b
 * @param int $c Параметр c
 * @return int Значение дискриминанта
 */
function discriminant(int $a, int $b, int $c): int
{
    return $b * $b - 4 * $a * $c;
}

function resolveQuadratic(int $a, int $b, int $c): string
{
    $discriminant = discriminant($a, $b, $c);

    if ($a === 0) {

        return 'Некорректные входные данные. $a не должен быть равным 0';
    }

    if ($discriminant > 0) {
        $x1 = ((-$b) + sqrt($discriminant)) / (2 * $a);
        $x2 = ((-$b) - sqrt($discriminant)) / (2 * $a);

        return 'D > 0, уравнение имеет 2 корня x1=' . $x1 . ' и x2=' . $x2;
    } elseif (0 == $discriminant) {
        $x = -($b / (2 * $a));

        return 'D === 0, уравнение имеет 1 корень x=' . $x;
    }

    return 'D < 0, нет корней!';
}


//дискриминант === 0
assert(0 == discriminant(0, 0, 0));
assert(0 == discriminant(1, 8, 16));
assert(0 == discriminant(3, -18, 27));
//дискриминант > 0
assert(81 == discriminant(1, -3, -18));
assert(49 == discriminant(1, 1, -12));
assert(9 == discriminant(1, -9, 18));
assert(36 == discriminant(1, -8, 7));
//дискриминант < 0
assert(-55 == discriminant(2, 1, 7));
assert(-7 == discriminant(1, -3, 4));
assert(-39 == discriminant(-1, 3, -12));

echo resolveQuadratic(0, 0, 0);
echo '<br>';
echo resolveQuadratic(1, 8, 16);
echo '<br>';
echo resolveQuadratic(3, -18, 27);
echo '<br>';
echo resolveQuadratic(1, -3, -18);
echo '<br>';
echo resolveQuadratic(1, 1, -12);
echo '<br>';
echo resolveQuadratic(1, -9, 18);
echo '<br>';
echo resolveQuadratic(1, -8, 7);
echo '<br>';
echo resolveQuadratic(2, 1, 7);
echo '<br>';
echo resolveQuadratic(1, -3, 4);
echo '<br>';
echo resolveQuadratic(-1, 3, -12);
echo '<br>';

?>

<?php
/**
 * 3. роведите самостоятельное исследование на тему "Что возвращает оператор include, если его использовать как функцию?".
 * Используйте руководство по языку, составьте и приложите примеры, иллюстрирующие ваше исследование.
 */

/** 1 Включение учитывается только в области в ключения. Если файл подключается в функции, то область видимости
 будет функция*/
function foo()
{
    include __DIR__ . '/file1.php';
    echo $test;
}
foo(); // Результат работы функции - значение переменной $test, включенной в функцию
//echo $test; //Notice: Undefined variable: test

/** 2 include включает и выполняет код файла*/
include __DIR__ . '/file2.php';
echo $resultMultiplication;
echo $a;
echo $b;
echo myOwnMultiplication(100, 50);


/** 3 include можно проверять подключение файлов: */
$x = include ( __DIR__ . '/file3.php');
if ($x) {
    echo 'OK';
}
//$x = include ( __DIR__ . '/notexist.php');
//if ($x) {
//    echo 'OK';//не выведется
//}

/** 4 include используемый как функция, на вход которой задан файл, будет возвращать значение этого файла */
$result = include ( __DIR__ . '/file5.php');
echo '<pre>'.print_r($result,1).'</pre>';

?>

<?php
/**
 * 4. * Составьте функцию, которая на вход будет принимать имя человека, а возвращать его пол, пытаясь угадать по имени
 * (null - если угадать не удалось). Вам придется самостоятельно найти нужные вам строковые функции.
 * Начните с написания тестов для функции.
 *
 * Метод для определения пола человека по имени.
 *
 * @param string $name
 * @return string
 */
function getGenderName(string $name): ?string
{
    $lastLetter = mb_substr($name, -1);

    switch ($lastLetter){
        case 'г':
        case 'й':
        case 'т':
        case 'р':
        case 'л':
        case 'н':
        case 'с':
        case 'м':
        case 'в':
        case 'ь':
        case 'д':
            return 'male';
        case 'а':
        case 'я':
            return 'female';

        default:
            return null;
    }
}

assert('male' == getGenderName('Олег'));
assert('male' == getGenderName('Андрей'));
assert('male' == getGenderName('Альберт'));
assert('male' == getGenderName('Дмитрий'));
assert('male' == getGenderName('Владимир'));
assert('male' == getGenderName('Михаил'));
assert('male' == getGenderName('Георгий'));
assert('male' == getGenderName('Лев'));
assert('male' == getGenderName('Игорь'));

assert('female' == getGenderName('Светлана'));
assert('female' == getGenderName('Света'));
assert('female' == getGenderName('Анна'));
assert('female' == getGenderName('Аня'));
assert('female' == getGenderName('Елена'));
assert('female' == getGenderName('Марина'));
assert('female' == getGenderName('Мария'));



?>
