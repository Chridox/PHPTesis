<?php

class tarea {
private $idTarea;
private $idMedidorTarea;
private $idTrabajadorTarea;
private $tareaTarea;
private $fechTarea;

function __construct($idTarea, $idMedidorTarea, $idTrabajadorTarea, $tareaTarea, $fechTarea) {
    $this->idTarea = $idTarea;
    $this->idMedidorTarea = $idMedidorTarea;
    $this->idTrabajadorTarea = $idTrabajadorTarea;
    $this->tareaTarea = $tareaTarea;
    $this->fechTarea = $fechTarea;
}

function getIdTarea() {
    return $this->idTarea;
}

function getIdMedidorTarea() {
    return $this->idMedidorTarea;
}

function getIdTrabajadorTarea() {
    return $this->idTrabajadorTarea;
}

function getTareaTarea() {
    return $this->tareaTarea;
}

function getFechTarea() {
    return $this->fechTarea;
}

function setIdTarea($idTarea) {
    $this->idTarea = $idTarea;
}

function setIdMedidorTarea($idMedidorTarea) {
    $this->idMedidorTarea = $idMedidorTarea;
}

function setIdTrabajadorTarea($idTrabajadorTarea) {
    $this->idTrabajadorTarea = $idTrabajadorTarea;
}

function setTareaTarea($tareaTarea) {
    $this->tareaTarea = $tareaTarea;
}

function setFechTarea($fechTarea) {
    $this->fechTarea = $fechTarea;
}



}
