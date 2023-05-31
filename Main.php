<?php

require_once 'models/Motos.php';
require_once 'models/Carros.php';

use ClaseCarro\Carros;
use ClaseMoto\Moto;

class Main {


    public static function Main(){  

        $obj = new Moto('AA-77',2);
        
        //echo $obj->valorParqueo("09:00","10:00");

        $car = new Carros(1,"qqq");

        echo $car->valorParqueo("09:00","21:00");
        echo $car->valorDescuento(62000);

        echo $car->factura();


    }

}




Main::Main();

