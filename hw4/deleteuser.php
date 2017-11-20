<?php
require_once ('dbconfig.php');
require_once ('functions.php');

$user = $_REQUEST['user'];
remove_user ($db,$user);
$user = select_login($db,$user);
print_r($user);
unlink($user['photo']);
header("Location: ".$_SERVER['HTTP_REFERER']);