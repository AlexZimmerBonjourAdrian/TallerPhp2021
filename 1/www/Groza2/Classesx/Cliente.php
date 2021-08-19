<?php
   
    class Cliente{
    


private $IdCli;
private $PassCli;
private $NomCli;
private $ApellidoCli;
private $FchadeN;
private $NickName;
function __construct($IdCli, $PassCli, $NomCli,$ApellidoCli,$FchadeN,$NickName)
{
$this->IdCli = $IdCli;
$this->PassCli = $PassCli;
$this->NomCli=$NomCli;
$this->ApellidoCli=$ApellidoCli;
$this->FchadeN=$FchadeN;
$this->NickName=$NickName;
}


function getCli()
{
    return $this->IdCli;
}

function setPassCli($PassCli)
{
     $this->PassCli=$PassCli;
}

function getPassCli()
{
    return $this->Passcli;
}

function setNomCli($NomCli)

{
    $this->NomCli=$NomCli;
}
function getNomCli()
{
    return this->NomCli;
}


function setApellido($ApellidoCli)
{
 $this->ApellidoCli=$ApellidoCli;
}


function getApellidoCli()
{
    return $this->ApellidoCli;
}


function setEmail($Email)
{
 $this->Email=$Email;
}

function getEmail()
{
    return $this->Email;;
}

function setFechdeN($FchadeN)
{
 $this->FchadeN=$FchadeN;
}


}

?>