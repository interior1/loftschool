<?php
require_once('dbconfig.php');
require ('functions.php');


echo '<table border="1"><caption>Клиенты</caption><tr><th>id</th><th>Name</th><th>Phone</th><th>E-mail</th></tr> ';

foreach ((select_orders($db,client)) as $client) {
    echo '<tr>';
    foreach ($client as $item) {
        echo '<td>';
        echo $item;
        echo '</td>';
    }
    echo '</tr>';
}

echo '</table><br /><br />';

echo '<table border="1"><caption>Заказы</caption><tr><th>id</th><th>Client_id</th><th>Street</th><th>Home</th><th>Korp</th><th>Flat</th><th>Floor</th><th>Comment</th><th>Payment</th><th>Callback</th></tr> ';

foreach ((select_orders($db,orders)) as $order) {
    echo '<tr>';
    foreach ($order as $item) {
        echo '<td>';
        echo $item;
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
