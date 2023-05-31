<?php
namespace ClaseCarro;

require_once 'Parquear.php';
require_once './interfaces/serviteca.php';

use ClaseParquear\Parquear;
use InterfaceServiteca\Serviteca;

class Carros extends Parquear implements Serviteca{

    // 1: automovil
    // 2: Campero

    private int $tipoVehiculos ;  


    public function __construct(int $tipoVehiculos, string $placa){
        parent::__construct($placa);
        $this->tipoVehiculos = $tipoVehiculos;
    }   


    public function getTipoVehiculo(){
        return $this->tipoVehiculos;
    }

    public function setTipoVehiculo(int $tipo){
        $this->tipoVehiculos = $tipo;
    }  



    public function valorParqueo(string $horallegda, string $horaSalida){
        
        $tiempoParqueo = 0;
        $valorPagar = 0;

        if ($horallegda >= "09:00" && $horaSalida <= "21:00"  ) {
            $tiempoParqueo = (strtotime($horaSalida) - strtotime($horallegda))/3600;  
            switch ($this->tipoVehiculos) {
                case 1:
                    $valorPagar = $this->getAuto() * $tiempoParqueo;
                    break;
                case 2:
                    $valorPagar = $this->getCempero() * $tiempoParqueo;
                    break;
                default:
                    
            }
            $this->setVlrParqueo($valorPagar);
        }
        
       
        //return $valorPagar;

    }


    public function lavadero(){

    }

    public function cambioAceite(){
    
    }

}

