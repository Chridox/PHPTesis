<?php

class medidores2 {
private $idMedidor2;
private $paisMedidorMedidor2;
private $marcaInicialMedidor2;
private $fechaIngresoMedidor2;
private $nombreContratoMedidor2;



function __construct($idMedidor2, $paisMedidorMedidor2, $marcaInicialMedidor2, $fechaIngresoMedidor2, $nombreContratoMedidor2) {
    $this->idMedidor2 = $idMedidor2;
    $this->paisMedidorMedidor2 = $paisMedidorMedidor2;
    $this->marcaInicialMedidor2 = $marcaInicialMedidor2;
    $this->fechaIngresoMedidor2 = $fechaIngresoMedidor2;
    $this->nombreContratoMedidor2 = $nombreContratoMedidor2;
}

function getIdMedidor2() {
    return $this->idMedidor2;
}

function getPaisMedidorMedidor2() {
    return $this->paisMedidorMedidor2;
}

function getMarcaInicialMedidor2() {
    return $this->marcaInicialMedidor2;
}

function getFechaIngresoMedidor2() {
    return $this->fechaIngresoMedidor2;
}

function getNombreContratoMedidor2() {
    return $this->nombreContratoMedidor2;
}

function setIdMedidor2($idMedidor2) {
    $this->idMedidor2 = $idMedidor2;
}

function setPaisMedidorMedidor2($paisMedidorMedidor2) {
    $this->paisMedidorMedidor2 = $paisMedidorMedidor2;
}

function setMarcaInicialMedidor2($marcaInicialMedidor2) {
    $this->marcaInicialMedidor2 = $marcaInicialMedidor2;
}

function setFechaIngresoMedidor2($fechaIngresoMedidor2) {
    $this->fechaIngresoMedidor2 = $fechaIngresoMedidor2;
}

function setNombreContratoMedidor2($nombreContratoMedidor2) {
    $this->nombreContratoMedidor2 = $nombreContratoMedidor2;
}





}
