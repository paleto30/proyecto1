<?php 

namespace InterfaceServiteca;



interface  Serviteca {

    const LAVA_AUTO = 25000;
    const LAVA_CAMP = 30000;
    const VLR_ACEITE = 15000;


    public function lavadero();
    public function cambioAceite();

}