<?php
require ('functions.php');

echo 'Задание #1 <br /><br />';

$arr = array('Вася','Петя','Саша');

echo 'Передаем параметр true:<br /><br />';
task1($arr,true);
echo '<br /><br />';

echo 'А теперь без него:<br />';

task1($arr);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #2 <br />';

echo '<p>В первое поле вводим цифры через запятую, во второе знак арифметического действия.<br />
Можно проверить некоректный ввод (не цифры, не арифметические знаки, деление на ноль)
</p><br />';


echo '<form name="task2" action="">
        <input name="nums" "text">
        <input name="math" "text">
        <input id=task2 type="submit">
        </form>';


if (isset($_REQUEST['nums'])&&isset($_REQUEST['math'])) {
    $nums = explode(",", $_REQUEST['nums']);
    $math = $_REQUEST['math'];
    task2($nums,$math);
};

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #3 <br />';
echo 'Передадим в функцию +, 1, 8, 10, 3.5<br />';

    task3('+', 1, 8, 10, 3.5);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #4 <br />';

echo '<p>Введите 2 целых числа от 1 до 20</p><br />';


echo '<form name="task4" action="">
        <input name="x" type="number">
        <input name="y" type="number">
        <input id=task4 type="submit">
        </form>';
if (isset($_REQUEST['x'])&&isset($_REQUEST['y'])) {
    $x = intval($_REQUEST['x']);
    $y = intval($_REQUEST['y']);
    task4($x,$y);
};
echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #5 <br />';

echo '<p>Проверим строку на палиндром:</p><br />';
echo '<form name="task5" action="">
        <input name="str" type="text">
        <input id=task5 type="submit">
        </form>';

if (isset($_REQUEST['str'])) {
    $str1 = $_REQUEST['str'];
    $pol = task5_1($str1);
    task5_2($pol, $str1);
};

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #6 <br />';

$format = 'd.m.Y H:i';
$date = '24.02.2016 00:00:00';
task6($format,$date);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #7 <br />';

$str1 = 'Карл у Клары украл Кораллы';
$str2 = 'Две бутылки лимонада';

task7($str1,$str2);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #8 <br />';

$rx_str = 'RX packets:1001 errors:0 dropped:0 overruns:0 frame:0.';

task8_2($rx_str);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #9 <br />';

echo '<p>Введите имя файла (test.txt)</p><br />';
echo '<form name="task9" action="">
        <input name="fname" type="text">
        <input id=task9 type="submit">
        </form>';

if (isset($_REQUEST['fname'])) {
    $fname = $_REQUEST['fname'];
    task9($fname);
};

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #10 <br />';

$s = 'Hello again!';
task10($s);

?>