<?php
require_once ('dbconfig.php');


//////////////////////check form values
function checkpost($value){

    if (empty($value)) {
        echo $value. 'is empty!';
    } else { return $value;
    };

}
//////////////////////check checkbox
function IsChecked($chkname)
{
    if(!empty($_REQUEST[$chkname]))
    {
        $chkname = '0';
        return $chkname;
    }

    $chkname = '1';
    return $chkname;
}

//////////////////////select clientid

function select_clientid($db,$email) {
    $q = $db->query("SELECT id FROM client WHERE email='$email'");
    $clientid = $q->fetch();
    $clientid = $clientid['id'];
    return $clientid;
}

//////////////////////select client email

function select_clientmail($db,$clientid) {
    $q = $db->query("SELECT email FROM client WHERE id='$clientid'");
    $clientid = $q->fetch();
    $clientid = $clientid['email'];
    return $clientid;
}

//////////////////////select clientid

function new_client($db,$email,$name,$phone) {

    $stmt = $db->prepare('INSERT INTO client (email,name,phone) VALUES (?,?,?)');
    $stmt->execute(array($email,$name,$phone));
}

//////////////////////update client

function update_client($db,$name,$phone,$clientid) {

    $query = "UPDATE client SET name = '$name', phone = '$phone' WHERE id = '$clientid'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $db->exec($query);
}

//////////////////////new order

function new_order($db,$clientid,$street,$home,$part,$appt,$floor,$comment,$payment,$callback) {

    $stmt = $db->prepare('INSERT INTO orders (client_id,str,home,korp,flat,floor,comm,payment,callback) VALUES (?,?,?,?,?,?,?,?,?)');
    $stmt->execute(array($clientid,$street,$home,$part,$appt,$floor,$comment,$payment,$callback));
}

/////////////////////select last order

function select_order($db,$clientid) {
    $q = $db->query("SELECT * FROM orders WHERE client_id = '$clientid' ORDER BY id DESC LIMIT 1");
    $order = $q->fetch();
    return $order;
}

/////////////////////count orders

function count_orders($db,$clientid) {
    $q = $db->prepare("SELECT * FROM orders WHERE client_id = '$clientid'");
    $count = $q->execute();
    $count = $q->rowCount();
    return $count;
}

/////////////////////select orders and users

function select_orders($db,$table) {
    $q = $db->query("SELECT * FROM $table");
    $tbl = $q->fetchAll();
    return $tbl;
}
