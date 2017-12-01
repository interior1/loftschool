<?php
namespace Car;

class Car {

    public $speed;
    public $distance;
    public $direction;
}

class TransmissionAuto extends Car
{
    use Drive_back;
    public function gear_on(){
        echo 'Включаем АКПП';
        echo 'Едем ' . $this->direction . '<br>';
    }
    public function gear_off(){
        echo 'Выключаем АКПП';
    }
}

class TransmissionManual extends Car
{
    use Drive_back;

    public function gear_on(){
        if ($this->speed>20) {
            echo 'Включаем МКПП на 2 передачу';
        } else {
            echo 'Включаем МКПП на 1 передачу';
        }
        echo 'Едем ' . $this->direction . '<br>';
    }
    public function gear_off(){
        echo 'Выключаем МКПП';
    }
}

trait Drive_back
{
    public function drive_back(){
        echo 'now you drive back. Speed: '. $this->speed;
    }
}

class Engine extends Car
{
    public $power;

    protected function engine_on(){
        echo 'Включаем двигатель<br>';
    }

    protected function engine_off(){
        echo 'Выключаем двигатель<br>';
    }

    protected function maxspeed(){
        $maxspeed = $this->power*2;
        if ($this->speed>$maxspeed){
            echo 'Превышена максимальная скорость двигателя!';
            exit();
        }
    }
    protected function distance(){
        $distance = $this->distance++;
        echo 'Всего проехали - '. $distance;
    }

    private function cooler(){
        $temp = (intdiv($this->distance,10))*5;
        if ($temp>90) {
            $count = intdiv(($temp-90),10);
            echo 'Включаем вентилятор' . $count . 'раз';

        }
    }
}

final class NIVA extends Car
{
    public function drive($distance,$speed,$direction) {
        $this->engine_on();
        $this->maxspeed();
        $this->cooler();
        $this->distance();
    }

    public $gear_type;

    public function __construct($gear_type) {
        if ($gear_type='АКПП'){
            echo 'Используем АКПП';
        } elseif ($gear_type='МКПП') {
            echo 'Используем МКПП';
        } else {
            echo 'Неправильный тип КПП';
        }
    }
}