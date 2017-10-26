<?php
require ('functions.php');

echo 'Задание #1 <br /><br />';

$xmlfname = 'data.xml';
task1($xmlfname);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #2 <br />';

$arr = array(array(11,12,13),array(21,22,23),array(31,32,33));
task2($arr);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #3 <br />';

$m = rand(50,70);
task3($m);

echo '<pre>';
//print_r($arr);

echo '<hr>';
/////////////////////////////////////////////////
echo 'Задание #4 <br />';

$url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
task4($url);
