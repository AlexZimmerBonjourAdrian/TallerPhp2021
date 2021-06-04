<?php
class Categoria {
  private $IdCat ;
  private $NomCat;
  private $IdP ;
  private $TipoCat;

  
  function __construct($IdCat,/*$NomCat,$IdP*/$TipoCat) {
    $this->IdCat = $IdCat;
    $this->TipoCat = $TipoCat;
    /*
    $this->IdCat = $IdCat;
    $this->NomCat = $NomCat;
    $this->IdP = $IdP;*/
  }

  function getTipoCat()
  {
    return $this->TipoCat;

  }
function getIdCat() {
    return $this->IdCat;
}
/*
function getNomCat() {
    return $this->NomCat;
}
*/
/*
function setIdP($IdP) {
  $this->IdP = $IdP;
}

function getIdP() {
  return $this->IdP;
}
*/

}

?> 