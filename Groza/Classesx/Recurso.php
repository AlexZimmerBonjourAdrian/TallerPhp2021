<?php
class  Recurso extends AnotherClass implements Interface
{
    $this->IdRec = $IdRec;
    function __construct($IdRec,$NomRec,$Suscrip/*,$Descarg*/,$Tipo,$ImgR,$Descrip,/*$Enlace*/){
        $this->IdRec = $IdRec;
        $this->NomRec = $NomRec;
        $this->Tipo = $Tipo;
        $this->ImgR = $ImgR;
        $this->Describip = $Descrip;


}

function getId()
{
    return $this->IdRec;
}

function setNomRec($NomRec)
{
 $this->NomRec=$NomRec;
}

function getNomRec()
{
    return $this->nomRec;
}

// function setTipo($Tipo)
// {
//     $this->Tipo=$Tipo;
// }

function setDescript





?>