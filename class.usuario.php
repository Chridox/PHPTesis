<?php

class usuario {
private $idUsuario;
private $logUsuario;
private $nombreUsuario;
private $conUsuario;
private $cargoUsuario;

function __construct($idUsuario, $logUsuario, $nombreUsuario, $conUsuario, $cargoUsuario) {
    $this->idUsuario = $idUsuario;
    $this->logUsuario = $logUsuario;
    $this->nombreUsuario = $nombreUsuario;
    $this->conUsuario = $conUsuario;
    $this->cargoUsuario = $cargoUsuario;
    
    
}
function getIdUsuario() {
    return $this->idUsuario;
}

function getLogUsuario() {
    return $this->logUsuario;
}

function getNombreUsuario() {
    return $this->nombreUsuario;
}

function getConUsuario() {
    return $this->conUsuario;
}

function getCargoUsuario() {
    return $this->cargoUsuario;
}

function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
}

function setLogUsuario($logUsuario) {
    $this->logUsuario = $logUsuario;
}

function setNombreUsuario($nombreUsuario) {
    $this->nombreUsuario = $nombreUsuario;
}

function setConUsuario($conUsuario) {
    $this->conUsuario = $conUsuario;
}

function setCargoUsuario($cargoUsuario) {
    $this->cargoUsuario = $cargoUsuario;
}




}
