<?php
class Proveedor {
  private $IdProv ;
  private $PassProv;
  private $NomProv;
  private $ApellidoProv;
  private $EmailProv;
  private $SexoProv;
  private $NicknameProv;
  private $FNProv;
  //private $ImgAut;


  
  function __construct($IdProv,$PassProv,$NomProv,$ApellidoProv,$EmailProv,$SexoProv,$NicknameProv,$FNProv,$ImgProv,$BiografiaProv) {
    $this->IdProv = $IdProv;
    $this->PassAut = $PassProv;
    $this->NomAut = $NomProv;
    $this->ApellidoAut = $ApellidoProv;
    $this->EmailAut = $EmailProv;
    $this->SexoAut = $SexoProv;
    $this->Nickname = $NicknameProv;
    $this->FNAut = $FNProv;
    $this->ImgAut = $ImgProv;
   // $this->BiografiaAut = $BiografiaAut;
  }


function getIdProv() {
    return $this->IdProv;
}

function setPassProv($PassProv) {
    $this->PassProv = $PassProv;
}

function getPassProv() {
    return $this->PassProv;
}

function setNomProv($NomProv) {
    $this->NomProv = $NomProv;
}

function getNomProv() {
    return $this->NomProv;
}

function setApellidoProv($ApellidoProv) {
    $this->ApellidoProv = $ApellidoProv;
}

function getApellidoProv() {
    return $this->ApellidoProv;
}

function setEmailProv($EmailProv) {
    $this->EmailAut = $EmailProv;
}

function getEmailProv() {
    return $this->EmailProv;
}

function setSexoProv($SexoProv) {
    $this->SexoProv = $SexoProv;
}

function getSexoProv() {
    return $this->SexoProv;
}

function setNicknameProv($NicknameProv) {
    $this->NicknameProv = $NicknameProv;
}

function getNicknameProv() {
    return $this->NicknameProv;
}

function setFProv($FNProv) {
    $this->FNProv = $FNProv;
}

function getFNProv() {
    return $this->FNProv;
}

function setImgProv($ImgProv) {
    $this->ImgProv = $ImgProv;
}

function getImgProv() {
    return $this->ImgProv;
}

function setBiografiaProv($BiografiaProv) {
    $this->BiografiaProv = $BiografiaProv;
}

function getBiografiaProv() {
    return $this->getBiografiaProv;
}

}

?> 