<?php

echo 'Задание #1 <br /><br />';

$name = 'Игорь';
$age = '36';
echo "Меня зовут $name <br />
      Мне $age лет <br />
      \"!|\/'\"\ ";

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #2 <br /><br />';

$fl = 23;
$kar = 40;
$kr = 80-($fl+$kar);
echo "Фломастерами $fl <br />
      Карандашами $kar <br />
      Красками $kr <br />";

echo '<hr>';
//////////////////////////////////////////////////
echo 'Задание #3 <br /><br />';

define("pi", 3.14);
if (defined("pi") == true) echo 'Константа pi объявлена!<br />';
echo 'Константа pi='. pi .'<br />';
define("pi", 3.15);
echo pi .'- константа так и не изменилась!<br />';

echo '<hr>';
//////////////////////////////////////////////////
echo 'Задание #4 <br /><br />';

$age = 66;

if ($age >= 18&&$age <= 65) {
 echo "Вам еще работать и работать!";
} elseif ($age > 65) {
 echo "Вам пора на пенсию";
} elseif ($age >= 1&&$age <= 18) {
 echo "Вам ещё рано работать";
} else {
 echo "Неизвестный возраст";
};

echo '<hr>';
//////////////////////////////////////////////////
echo 'Задание #5 <br /><br />';

$day = rand(1,10);
echo "День $day <br />";
//$day = rand(1,7);
switch ($day) {
case ($day >= 1&&$day <= 5):
echo "Это рабочий день";
break; case ($day >= 6&&$day <= 7):
echo "Это выходной день";
break; //case ($day > 7||$day < 1):
default:
echo "Неизвестный день";
break; };

echo '<hr>';
//////////////////////////////////////////////////
echo 'Задание #6 <br /><br />';

$bmw = array (
	 "model" => 'X5',
         "speed" => '120',
	 "doors" => "5",
	 "year"	 => "2015",
);                  
$toyota = array (
	 "model" => 'Camry',
         "speed" => '110',
	 "doors" => "5",
	 "year"	 => "2010",
);                  
$opel = array (
	 "model" => 'Astra',
         "speed" => '100',
	 "doors" => "3",
	 "year"	 => "2012",
);
$cars = array (                  
	 "bmw" => $bmw,
         "toyota" => $toyota,
	 "opel" => $opel,
);

foreach ($cars as $key => $value)  {
echo '<br />';
echo 'CAR '. $key. '<br />';
	foreach ($value as $key => $value) {
echo ' '. $value;
	}

}

echo '<hr>';
//////////////////////////////////////////////////
echo 'Задание #7 <br /><br />';

echo'<table border=1>';

for($i = 1; $i < 10; $i++) {
  echo'<tr>';
  for($j = 1; $j < 10; $j++) 

if ((($i % 2) ==0)&&(($j % 2)==0)) {
    echo '<td>(' .$i*$j. ')</td>';
} elseif ((($i % 2) ==1)&&(($j % 2)==1)) {
    echo '<td>[' .$i*$j. ']</td>';
} else {
    echo '<td>' .$i*$j. '</td>';
};

  echo'</tr>';
}
echo'</table>';


echo '<hr>';
//////////////////////////////////////////////////
echo 'Задание #8 <br /><br />';

$str = 'раз два три четыре пять';

$arr = explode(" ",$str);
echo '<pre>';
var_dump($arr);

echo '<br />';

$end = end($arr);

While ($end) 
  { 
    echo $end.'|'; 
    $end = prev($arr); 
  } 