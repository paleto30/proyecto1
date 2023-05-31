<?php 

namespace ClaseMoto;
require_once 'Parquear.php';


use ClaseParquear\Parquear;

class Moto extends Parquear{

    private int $nrCascos;

    // constructor de la clase
    public function __construct(string $placa, int $nrCascos){
        parent::__construct($placa);
        $this->nrCascos = $nrCascos;
    }


    public function getNCascos(): int{
        return $this->nrCascos;
    } 

    public function setNCascos(int $nrCascos): void {
        $this->nrCascos = $nrCascos;
    }


    /* 
        esta funcion me permite establecer un valor de parqueo 
        segun las reglas.

        recibe 2 parametros : horaLlegada y HoraSalida de tipo date('H:i')
    */
    public function valorParqueo(string $horallegda, string $horaSalida){ 
        
        $tiempoParqueo = 0;
        $valorPagar = 0;
        if ($horallegda>="09:00" && $horaSalida <= "21:00") {
            $tiempoParqueo = (strtotime($horaSalida) - strtotime($horallegda))/3600;            
            $valorPagar = ($this->getMoto() * $tiempoParqueo) + ($this->getCasco() * $this->nrCascos *  $tiempoParqueo);
            $this->setVlrParqueo(floatval($valorPagar));
            //return $valorPagar;
        }
    }

    /* 
        funcion para obtener el valor de descuento segun el valor de la factura 
        recibe el parametro factura (valor factura)
    */
    public function valorDescuento(float $factura){
        $valorDescuento = 0;
        
        if ($factura > 500000) {
            $valorDescuento = $this->getVlrParqueo();
        }else if ($factura > 160000){
            $valorDescuento = $this->getVlrParqueo() * 0.7;
        }else if ($factura > 100000 && $factura <= 160000){
            $valorDescuento = $this->getVlrParqueo() * 0.6;
        }else if ($factura >= 60000 && $factura <= 100000){
            $valorDescuento = $this->getVlrParqueo() * 0.5;
        }
        $this->setVlrDescueno($valorDescuento);
    }
}


