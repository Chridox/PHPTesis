<?php

class listadoFinal {
    private $idTareaLista, $nroMedidorLista,$trabAsignadoLista,$trabajoLista,$estadoLista,$recibidoLista,$obsLista,$fecLista;
    
    function __construct($idTareaLista, $nroMedidorLista, $trabAsignadoLista, $trabajoLista, $estadoLista, $recibidoLista, $obsLista, $fecLista) {
        $this->idTareaLista = $idTareaLista;
        $this->nroMedidorLista = $nroMedidorLista;
        $this->trabAsignadoLista = $trabAsignadoLista;
        $this->trabajoLista = $trabajoLista;
        $this->estadoLista = $estadoLista;
        $this->recibidoLista = $recibidoLista;
        $this->obsLista = $obsLista;
        $this->fecLista = $fecLista;
    }
    
    function getIdTareaLista() {
        return $this->idTareaLista;
    }

    function getNroMedidorLista() {
        return $this->nroMedidorLista;
    }

    function getTrabAsignadoLista() {
        return $this->trabAsignadoLista;
    }

    function getTrabajoLista() {
        return $this->trabajoLista;
    }

    function getEstadoLista() {
        return $this->estadoLista;
    }

    function getRecibidoLista() {
        return $this->recibidoLista;
    }

    function getObsLista() {
        return $this->obsLista;
    }

    function getFecLista() {
        return $this->fecLista;
    }

    function setIdTareaLista($idTareaLista) {
        $this->idTareaLista = $idTareaLista;
    }

    function setNroMedidorLista($nroMedidorLista) {
        $this->nroMedidorLista = $nroMedidorLista;
    }

    function setTrabAsignadoLista($trabAsignadoLista) {
        $this->trabAsignadoLista = $trabAsignadoLista;
    }

    function setTrabajoLista($trabajoLista) {
        $this->trabajoLista = $trabajoLista;
    }

    function setEstadoLista($estadoLista) {
        $this->estadoLista = $estadoLista;
    }

    function setRecibidoLista($recibidoLista) {
        $this->recibidoLista = $recibidoLista;
    }

    function setObsLista($obsLista) {
        $this->obsLista = $obsLista;
    }

    function setFecLista($fecLista) {
        $this->fecLista = $fecLista;
    }



}
