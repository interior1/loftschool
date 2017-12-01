<?php

namespace Car;

include_once ('carclass.php');


$car = new NIVA('АКПП');
echo '<pre>';
print_r($car);
//$car->gear_type = 'АКПП';
print_r($car->gear_type);
//$car->drive();