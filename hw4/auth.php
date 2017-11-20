<?php
require ('dbconfig.php');
require ('functions.php');
session_start();
if ($_POST['action'] == 'logout') {
    var_dump($_POST['action']);
    echo 'Всего доброго ' . $_SESSION['user'];
    unset($_SESSION['autorized']);
    unset ($_SESSION['user']);
    session_destroy();
    sleep(3);
    header("Location: index.php");
    exit;
};


$login = $_POST['login'];
$password = $_POST['password'];
$hash = select_password($db,$login);
$hash = $hash['password'];

if (!select_login($db,$login)){
    echo "<h2>Пользователя с логином $login не существует!<h2>";
    sleep(3);
    header("Location: index.php");
} elseif (!password_verify($password,$hash)) {
    echo "Пароль для логина $login не верный!";
    sleep(3);
    header("Location: index.php");

} else {
    session_start();
    $_SESSION['autorized'] = TRUE;
    $_SESSION['user'] = $login;
    echo "Добро пожаловать $login!";
    sleep(3);
    header("Location: index.php");
};


/*
function new_client($db) {
$password = password_hash('igor', PASSWORD_DEFAULT);
    $stmt = $db->prepare('INSERT INTO users (login,password,name,age) VALUES (?,?,?,?)');
    $stmt->execute(array('igor',$password,'Игорь',date('DD-MM-YYYY','01-08-1981')));
}

new_client($db);
*/