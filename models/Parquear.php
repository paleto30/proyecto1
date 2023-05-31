<?php

namespace ClaseParquear;

abstract class Parquear {

    private string $placa ; 

    private int $auto = 3500; 
    private int $campero = 4500;
    private int $moto = 1700;
    private int $casco = 300;

    private float $vlrParqueo;
    private float $vlrDescuento;
    
    
    public function __construct(string $placa)
    {
        $this->placa = $placa;
    }

    public function getPlaca(): string {
        return $this->placa;
    } 
    public function setPlaca(string $placa): void {
        $this->placa = $placa;
    }

    public function getAuto(): int {
        return $this->auto;
    }
    public function getCempero(): int { 
        return $this->campero;
    }
    public function getMoto(): int {
        return $this->moto;
    }
    public function getCasco(): int {
        return $this->casco;
    }


    public function getVlrParqueo(): float {
        return $this->vlrParqueo;
    }
    public function setVlrParqueo(float $vlrParqueo): void {
        $this->vlrParqueo = $vlrParqueo;
    }


    public function getVlrDescueno(): float {
        return $this->vlrDescuento;
    }
    public function setVlrDescueno(float $vlrDescuento): void {
        $this->vlrDescuento = $vlrDescuento;
    }


    /* 
        esta funcion me permite establecer un valor de parqueo 
        segun las reglas.

        recibe 2 parametros : horaLlegada y HoraSalida de tipo date('H:i')
    */
    abstract public function valorParqueo(string $horallegda, string $horaSalida);


    /* 
        funcion para obtener el valor de descuento segun el valor de la factura 
        recibe el parametro factura (valor factura)
    */
    public function valorDescuento(float $factura){
        $valorDescuento = 0;

        if ($factura > 160000){
            $valorDescuento = $this->getVlrParqueo() * 0.7;
        }else if ($factura > 100000 && $factura <= 160000){
            $valorDescuento = $this->getVlrParqueo() * 0.6;
        }else if ($factura >= 60000 && $factura <= 100000){
            $valorDescuento = $this->getVlrParqueo() * 0.5;
        }
        $this->setVlrDescueno($valorDescuento);
    }


    public function factura(){
        return "Valor de Parqueo: $this->vlrParqueo \nValor de descuento: $this->vlrDescuento\nValor total: ".($this->vlrParqueo-$this->vlrDescuento)."\n";
    }

}