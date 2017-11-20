<?php
require ('dbconfig.php');
require ('functions.php');
session_start();

$login = $_POST['login'];
$password = $_POST['password'];
$vpassword = $_POST['vpassword'];
$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];
$photo = $_FILES['photo']['name'];
$filepath = checkphoto($photo);
$hash = password_hash($password, PASSWORD_DEFAULT);

if (select_login($db,$login)){
    echo "Пользователь с таким логином уже существует!";
    exit;
   } elseif ($password !== $vpassword) {
    echo "Пароли не совпадают!";
    exit;
} else {
    new_user($db,$login,$hash,$name,$age,$description,$filepath);
    session_start();
    $_SESSION['autorized'] = TRUE;
    $_SESSION['user'] = $login;
    header("Location: index.php");
};