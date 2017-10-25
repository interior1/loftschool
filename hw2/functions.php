<?php

function task1($arr, $b = false) {

if ($b == true) { 
$arr = print_r(implode($arr,""));
return $arr;

} else {
    foreach ($arr as $str) {
        echo '<p>' . $str . '</p>';
        }
   }

};
//////////////////////////////////////////////////////////
function task2($nums,$math){
    foreach($nums as $num) {
        if (!is_numeric($num)) {
            echo '<b>Результат: нужны только цифры нам, о юный падаван!</b>';
            die();
        }
    };
            switch ($math) {

                case '+':
                    $sum = 0;
                    foreach ($nums as $num) {
                        $sum += $num;
                    };
                    break;
                case '-':
                    $sum = $nums[0];
                    foreach ($nums as $key => $num) {
                        if ($key == 0)
                            continue;
                        $sum -= $num;
                    };
                    break;
                case '*':
                    $sum = $nums[0];
                    print_r($nums);
                    foreach ($nums as $key => $num) {
                        if ($key == 0)
                            continue;
                        $sum *= $num;
                    };
                    break;
                case '/':
                    $sum = $nums[0];
                    foreach ($nums as $key => $num) {
                        if ($key == 0) {
                            continue;
                        } elseif ($num == 0) {
                            echo '<b>Делить на ноль? Извольте!</b>';
                            die();
                        } else {
                            $sum /= $num;
                        }
                    };
                    break;
                default:
                    $sum = '<b>Такая математика не для нас!</b>';

                }
    echo "<b>Результат: $sum</b>";
};
////////////////////////////////////////////////////////////
function task3(){
    $nums = func_get_args();
    $math = array_shift($nums);

    //дальше задача сводится к предыдущей, но тут я обнаружил array_shift()
    //и решил сделать ее немного подругому :)

    foreach($nums as $num) {
        if (!is_numeric($num)) {
            echo '<b>Результат: нужны только цифры нам, о юный падаван!</b>';
            die();
        }
    };
            switch ($math) {
                case '+':
                    $sum = 0;
                    foreach ($nums as $num) {
                        $sum += $num;
                    };
                    break;
                case '-':
                    $sum = array_shift($nums);
                    foreach ($nums as $num) {
                        $sum -= $num;
                    };
                    break;
                case '*':
                    $sum = array_shift($nums);
                    foreach ($nums as $key => $num) {
                        $sum *= $num;
                    };
                    break;
                case '/':
                    $sum = array_shift($nums);
                    foreach ($nums as $key => $num) {
                        if ($num == 0) {
                            echo '<b>Делить на ноль? Извольте!</b>';
                            die();
                        } else {
                            $sum /= $num;
                        }
                    };
                    break;
                default:
                    $sum = '<b>Такая математика не для нас!</b>';
            }
    echo "<b>Результат: $sum</b>";
};

//////////////////////////////////////////////////

function task4($x,$y){

    if ((!is_integer($x)||!is_integer($y))||($x>20||$y>20)||($x<1||$y<1)) {
        echo '<b>Результат: нужны только целые числа нам, о юный падаван! Желательно от 1 до 20</b>';
        die();
    }
    echo'<table border=1>';
    for($i = 1; $i <= abs($x); $i++) { //если ввели отрицательные, то возьмем по модулю
        echo'<tr>';
        for($j = 1; $j <= abs($y); $j++)

            echo '<td>' .$i*$j. '</td>';

        echo'</tr>';
    }
    echo'</table>';

};

//////////////////////////////////////////////////
function task5_1($str1){
    $str1 = mb_strtolower($str1, "UTF-8");
    $str1 = str_replace(" ","",$str1);

    $str2 = "";
    for($i = mb_strlen($str1, "UTF-8"); $i >= 0; $i--) {
        $str2 .= mb_substr($str1, $i, 1, "UTF-8");
    }
    if($str1 != $str2){
        return FALSE;
    } else {
        return TRUE;
    }
};

function task5_2($pol,$str1){
    if ($pol == TRUE) {
        echo 'Строка  - "' . $str1 . '" - палиндром';
        } else {
        echo 'Строка  - "' . $str1 . '" - не палиндром';

    }
};
///////////////////////////////////////////////////
function task6($format,$date){

    $date1 = date($format);
    $date2 = strtotime($date);
    echo 'Текущая дата: ' . $date1 . '<br />Время в unixtime: ' . $date2;

};
///////////////////////////////////////////////////
function task7($str1,$str2){
    $str1 = str_replace("К", "к", $str1);
    $str2 = str_replace("Две", "Три", $str2);
    echo $str1 . '<br />' . $str2;
};
////////////////////////////////////////////////////
function task8_1(){
    echo '<pre>';
    echo '   
             OOOOOOOOOOO
         OOOOOOOOOOOOOOOOOOO
      OOOOOO  OOOOOOOOO  OOOOOO
    OOOOOO      OOOOO      OOOOOO
  OOOOOOOO  #   OOOOO  #   OOOOOOOO
 OOOOOOOOOO    OOOOOOO    OOOOOOOOOO
OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
OOOO  OOOOOOOOOOOOOOOOOOOOOOOOO  OOOO
 OOOO  OOOOOOOOOOOOOOOOOOOOOOO  OOOO
  OOOO   OOOOOOOOOOOOOOOOOOOO  OOOO
    OOOOO   OOOOOOOOOOOOOOO   OOOO
      OOOOOO   OOOOOOOOO   OOOOOO
         OOOOOO         OOOOOO
             OOOOOOOOOOOO';
};
function task8_2($rx_str){
    preg_match('/[\d]+/',$rx_str,$speed);
    preg_match('/:\)/',$rx_str,$smile);
    if ($smile) {
        task8_1();
        //echo 'Сеть есть!';
    } elseif ($speed[0]>1000) {
        echo 'Сеть есть!';
        };
};
//////////////////////////////////////////////////////
function task9($fname){
    print_r(file_get_contents($fname));
};

function task10($s){
    echo 'Создаем файл и поместим в него строку<br />';
    file_put_contents('anothertest.txt',$s);
    echo 'Прочитаем содержимое:<br />';
    print_r(file_get_contents('anothertest.txt'));
};
?>