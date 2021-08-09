<?php
class comunas {
private $idComunas;
private $nombreComunas;



function __construct($idComunas, $nombreComunas) {
    $this->idComunas = $idComunas;
    $this->nombreComunas = $nombreComunas;
}
function getIdComunas() {
    return $this->idComunas;
}

function getNombreComunas() {
    return $this->nombreComunas;
}

function setIdComunas($idComunas) {
    $this->idComunas = $idComunas;
}

function setNombreComunas($nombreComunas) {
    $this->nombreComunas = $nombreComunas;
}


}
