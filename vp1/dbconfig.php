<?php
$host = "192.168.135.155";
$user = "root";
$pass = "9299641374";
$dbname = "burger";
$charset = "utf8";

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
try {
    $db = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}