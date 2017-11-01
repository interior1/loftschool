<?php
//header('Content-Type: text/html; charset=utf-8');
require_once('dbconfig.php');
require ('functions.php');

$email = checkpost($_POST['email']);
$name = checkpost($_POST['name']);
$phone = checkpost($_POST['phone']);
$street = checkpost($_POST['street']);
$home = checkpost($_POST['home']);
$part = checkpost($_POST['part']);
$appt = checkpost($_POST['appt']);
$floor = checkpost($_POST['floor']);
$comment = checkpost($_POST['comment']);
$payment = IsChecked($_POST['payment']);
$callback = IsChecked($_POST['callback']);

$clientid = select_clientid($db,$email);

if($clientid) {
    update_client($db,$name,$phone,$clientid);
    new_order($db,$clientid,$street,$home,$part,$appt,$floor,$comment,$payment,$callback);
    $order_count = count_orders($db,$clientid);
    $c = "Спасибо! Это уже ваш $order_count заказ!";
} else {
    new_client($db,$email,$name,$phone);
    $clientid = select_clientid($db,$email);
    new_order($db,$clientid,$street,$home,$part,$appt,$floor,$comment,$payment,$callback);
    $c = 'Спасибо за ваш первый заказ!';
};

$order = select_order($db,$clientid);
$orderid = $order['id'];

$mes = "Заказ №$orderid\n
        Ваш заказ будет доставлен по адресу: $street,$home,$part,$appt,$floor\n
        DarkBeefBurger 500р - 1шт\n
        $c\n\n";

file_put_contents('mail.txt',$mes,FILE_APPEND);

////or send mail
//$send = mail ($email,'Заказ',$mes,"Content-type:text/plain;");



echo '<pre>';
print_r(select_order($db,$clientid));
echo '<br />';
print_r(count_orders($db,$clientid));