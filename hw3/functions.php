<?php

function task1($xmlfname) {

    $xml=file_get_contents($xmlfname);
    $xml = simplexml_load_string($xml);
    $json = json_encode($xml);
    $order = json_decode($json,TRUE);
    //я знаю как с xml можно работать как с объектом, но ООП мы еще не проходили, поэтому запилим массив :)

    echo 'Order: #'. $order['@attributes']['PurchaseOrderNumber'] . '<br/>
        Date: ' . $order['@attributes']['OrderDate'] . '<br /><br /><br />';
    echo '<table border="1" width="20%" style="float: left;"><caption>' . $order['Address'][0]['@attributes']['Type'] . '</caption>';
    echo '<tr><td>Name</td><td><b>' . $order['Address'][0]['Name'] . '</b></td></tr>';
    echo '<tr><td>Street</td><td><b>' . $order['Address'][0]['Street'] . '</b></td></tr>';
    echo '<tr><td>City</td><td><b>' . $order['Address'][0]['City'] . '</b></td></tr>';
    echo '<tr><td>State</td><td><b>' . $order['Address'][0]['State'] . '</b></td></tr>';
    echo '<tr><td>Zip</td><td><b>' . $order['Address'][0]['Zip'] . '</b></td></tr>';
    echo '<tr><td>Country</td><td><b>' . $order['Address'][0]['Country'] . '</b></b></td></tr>';
    echo '</table>';
    echo '<table border="1" width="20%" style="float: left;"><caption>' . $order['Address'][1]['@attributes']['Type'] . '</caption>';
    echo '<tr><td>Name</td><td><b>' . $order['Address'][1]['Name'] . '</b></td></tr>';
    echo '<tr><td>Street</td><td><b>' . $order['Address'][1]['Street'] . '</b></td></tr>';
    echo '<tr><td>City</td><td><b>' . $order['Address'][1]['City'] . '</b></td></tr>';
    echo '<tr><td>State</td><td><b>' . $order['Address'][1]['State'] . '</b></td></tr>';
    echo '<tr><td>Zip</td><td><b>' . $order['Address'][1]['Zip'] . '</b></td></tr>';
    echo '<tr><td>Country</td><td><b>' . $order['Address'][1]['Country'] . '</b></b></td></tr>';
    echo '</table>';
    echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />Delivery notes: ' . $order['DeliveryNotes'] . '<br /><br />';
    echo '<table border="1" width="60%"><caption>Items</caption><br />';
    echo '<tr><th>Part #</th><th>Product</th><th>Qty</th><th>Price</th><th>Ship date</th><th>Comment</th></tr>';

    foreach ($order['Items']['Item'] as $item) {
        echo '<tr><td>' . $item['@attributes']['PartNumber'] . '</td>';
        echo '<td>' . $item['ProductName'] . '</td>';
        echo '<td>' . $item['Quantity'] . '</td>';
        echo '<td>' . $item['USPrice'] . '</td>';
        echo '<td>' . $item['ShipDate'] . '</td>';
        echo '<td>' . $item['Comment'] . '</td>';
    }
    echo '</tr></table>';
};

///////////////////////////////////////////////////////////
function task2($arr) {
    $json = json_encode($arr);
    file_put_contents('output.json',$json);
    $json = json_decode(file_get_contents('output.json'));
    $r = rand(0,1);
    if ($r == 1)
        $json[1][0] = $r;
        file_put_contents('output2.json',json_encode($json));
        $arr1 = json_decode(file_get_contents('output.json'));
        $arr2 = json_decode(file_get_contents('output2.json'));
        echo '<pre>';
    for ($i = 0; $i < count($arr1); $i++) {
        $diff = array_diff($arr1[$i],$arr2[$i]);
        if (!empty($diff))
            print_r($diff);
        }
};

///////////////////////////////////////////////////////////
function task3($m) {

    $randarr = array();
    for ($i = 0; $i < $m; $i++) {
        $randarr[]=rand(1,100);
    }
    $csv = fopen('data.csv', 'w');
    fputcsv($csv, $randarr);
    fclose($csv);
    $csv = fopen('data.csv', 'r');
    $csv_arr = fgetcsv($csv);
    $sum = 0;
    foreach ($csv_arr as $num) {
        if ($num%2 == 0) {
            $sum += $num;
            echo $num . '+';
        };
    };
    echo '='. $sum;
    fclose($csv);
};
///////////////////////////////////////////////////////////
function task4($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $json = json_decode($result,TRUE);
    curl_close($ch);
    echo 'page id: ' . $json['query']['pages']['15580374']['pageid'] . '<br />title: '. $json['query']['pages']['15580374']['title'];
};