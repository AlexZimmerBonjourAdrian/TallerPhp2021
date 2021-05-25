<?php
class Subscripcion 
{
    private $IdSub;
    private $monto;
    private $EmailUser;

    function __construct($IdSub,$monto)
    {
        $this->$IdSub;
        $this->$monto;
        
    }

    function getIdSub()
    {

        return $this->IdSub;
    }
    
    function setMonto($monto)
    {
        $this->monto = $monto;
    }
    
    function getMonto()
    {
        return $this->monto;
    }

    

}


?>