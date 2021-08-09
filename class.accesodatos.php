<?php

require 'class.usuario.php';
require 'class.tarea.php';
require 'class.medidores2.php';
require 'class.comunas.php';
require 'class.listadoFinal.php';

class accesodatos {
    private $mi;
    private function conexion(){
        $this->mi = new mysqli("ns20.hostgator.cl","aguaproy_conexion","12345","aguaproy_aguacoop");
        if ($this->mi->connect_errno) {
            die("Error al conectarse a la base de datos");
        }
    }
    
    private function desconexion(){
        $this->mi->close();
    }
    
    public function validarUsuario($log,$pas){
        $this->conexion();
        $sql = "select * from usuarios where logUsuario= Binary '$log' and conUsuario= Binary '$pas'";
        $st = $this->mi->query($sql);
        if ($rs = mysqli_fetch_array($st)) {
            $nom = $rs['nombreUsuario'];
            $car = $rs['cargoUsuario'];
            $usu = new usuario($id,$log,$nom,$con,$car);
            $this->desconexion();
            return $usu;
        }else{
            $this->desconexion();
            return 0;
        }
    }
    
    public function listarMedidor(){
        $this->conexion();
        $sql ="select * from medidores order by idMedidor ASC";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $id = $rs[0];
            $dir = $rs[1];
            $lat = $rs[2];
            $lon = $rs[3];
            $contrato = $rs[4];
            $MedidorLista = new medidor($id,$dir,$lat,$lon,$contrato);
            $lista[] = $MedidorLista;       
        }
        $this->desconexion();
        return $lista;
    }
    public function listarUsuario(){
        $this->conexion();
        $sql ="select * from usuarios where cargoUsuario='Operador' order by nombreUsuario ASC";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idUsu = $rs[0];
            $logUsu = $rs[1];
            $nomUsu = $rs[2];
            $conUsu = $rs[3];
            $carUsu = $rs[4];
            $usuLista = new usuario($idUsu,$logUsu,$nomUsu,$conUsu,$carUsu);
            $lista[] = $usuLista;  
        }
        $this->desconexion();
        return $lista;
    }
    public function registrarMedidor(medidores $med){
        $this->conexion();
        $dir = $med->getDireccionMedidor();
        $lat = $med->getLatitudMedidor();
        $lng = $med->getLongitudMedidor();
        $cnt = $med->getContratoMedidor();
        $sql = "insert into medidores values(null,'$dir','$lat','$lng','$cnt')";
        $st = $this->mi->query($sql);
        $this->desconexion();
    }
    
    public function registrarTarea(tarea $tarea){
        $this->conexion();
        $idMed = $tarea->getIdMedidorTarea();
        $idUsu = $tarea->getIdTrabajadorTarea();
        $tarTar = $tarea->getTareaTarea();
        $fech = $tarea->getFechTarea();
        $sql = "insert into tareas values(null,'$idMed','$idUsu','$tarTar','$fech',0)";
        $st = $this->mi->query($sql);
        $this->desconexion();
    }
    
    public function registrarMedidor2(medidores2 $med2){
        $this->conexion();
        $idMed2 = $med2->getIdMedidor2();
        $paisMed2 = $med2->getPaisMedidorMedidor2();
        $marcaMed2 = $med2->getMarcaInicialMedidor2();
        $fecMed2 = $med2->getFechaIngresoMedidor2();
        $sql = "insert into medidores2 values('$idMed2','$paisMed2','$marcaMed2','$fecMed2',0,0,'','','','')";
        $st = $this->mi->query($sql);
        $this->desconexion();
    }
    
    public function registrarUsuario(usuario $usu){
        $this->conexion();
        $logUsu = $usu->getLogUsuario();
        $nomUsu = $usu->getNombreUsuario();
        $conUsu = $usu->getConUsuario();
        $carUsu = $usu->getCargoUsuario();
        $sql = "insert into usuarios values(null,'$logUsu','$nomUsu','$conUsu','$carUsu')";
        $st = $this->mi->query($sql);
        $this->desconexion();
    }
    
    public function listarMedidores($condicion){
        $this->conexion();
        $sql ="select * from medidores2 where instaladoMedidor2=$condicion order by idMedidor2 ASC";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idMed2 = $rs[0];
            $paisMed2 = $rs[1];
            $marcaMed2 = $rs[2];
            $fechIngresoMed2 = $rs[3];
            $nomContrato = $rs[9];
            $MedidorLista2 = new medidores2($idMed2,$paisMed2,$marcaMed2,$fechIngresoMed2,$nomContrato);
            $lista[] = $MedidorLista2;       
        }
        $this->desconexion();
        return $lista;
    }
    public function listarMedidorNoInstalados(){
        $this->conexion();
        $sql ="select * from medidores2 where instaladoMedidor2=0 order by idMedidor2 ASC";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idMed2 = $rs[0];
            $paisMed2 = $rs[1];
            $marcaMed2 = $rs[2];
            $fechIngresoMed2 = $rs[3];
            $nombreContratoMed2 = $rs[9];
            $MedidorLista2 = new medidores2($idMed2,$paisMed2,$marcaMed2,$fechIngresoMed2,$nombreContratoMed2);
            $lista[] = $MedidorLista2;         
        }
        $this->desconexion();
        return $lista;
    }

    public function listarMedidorInstalado(){
        $this->conexion();
        $sql ="select * from medidores2 where instaladoMedidor2=1 order by idMedidor2 ASC";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idMed2 = $rs[0];
            $paisMed2 = $rs[1];
            $marcaMed2 = $rs[2];
            $fechIngresoMed2 = $rs[3];
            $nombreContratoMed2 = $rs[9];
            $MedidorLista2 = new medidores2($idMed2,$paisMed2,$marcaMed2,$fechIngresoMed2,$nombreContratoMed2);
            $lista[] = $MedidorLista2;         
        }
        $this->desconexion();
        return $lista;
        
        
    }
    public function listarTrabajos(){
        $this->conexion();
        $sql ="select tareas.idTarea, tareas.idMedidor2, usuarios.nombreUsuario, tareas.tareaTarea, tareas.fecha, tareas.estadoTarea from tareas,usuarios where tareas.idUsuario=usuarios.idUsuario order by tareas.fecha asc";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idTar = $rs[0];
            $idMedidorTar = $rs[1];
            $idUsuarioTar = $rs[2];
            $tareaTar = $rs[3];
            $fecTar = $rs[4];
            $tareaLista = new tarea($idTar,$idMedidorTar,$idUsuarioTar,$tareaTar,$fecTar);
            $lista[] = $tareaLista;            
        }
        $this->desconexion();
        return $lista;
    }

    public function eliminarTarea($id){
        $this->conexion();
        $sql="delete from tareas where idTarea='$id'";
        $st = $this->mi->query($sql);
        if ($this->mi->affected_rows==1) {
            echo "<script>alert('Se elimino con exito')</script>";
        }else{
            echo "<script>alert('No se pudo eliminar')</script>";
        }
        $this->desconexion();
    }
    
    public function eliminarMedidor($id){
        $this->conexion();
        $sql="delete from medidores2 where idMedidor2='$id'";
        $st = $this->mi->query($sql);
        if ($this->mi->affected_rows==1) {
            echo "<script>alert('Se elimino con exito')</script>";
        }else{
            echo "<script>alert('No se pudo eliminar')</script>";
        }
        $this->desconexion();
    }
    public function eliminarUsuario($id){
        $this->conexion();
        $sql="delete from usuarios where idUsuario='$id'";
        $st = $this->mi->query($sql);
        if ($this->mi->affected_rows==1) {
            echo "<script>alert('Se elimino con exito')</script>";
        }else{
            echo "<script>alert('No se pudo eliminar')</script>";
        }
        $this->desconexion();
    }

    public function instalarMedidor($idMod,$nroMod,$latMod,$lngMod,$dirMod,$nomContrat,$comuna){
        $this->conexion();
        $sql = "update medidores2 set instaladoMedidor2=1, nroInicialMedidor2='$nroMod',latMed2='$latMod',lngMed2='$lngMod',dirMedidor2='$dirMod',nombreContrato='$nomContrat',	comunaMedidor='$comuna' where idMedidor2='$idMod'";
        $st = $this->mi->query($sql);
        if ($this->mi->affected_rows==1) {
            echo "<script>alert('Se registro con exito')</script>";
        }else{
            echo "<script>alert('No se pudo registro')</script>";
        }
        $this->desconexion();
    }
    
    public function listarMedidores2(){
        $this->conexion();
        $sql ="select medidores2.idMedidor2, medidores2.paisMedidorMedidor2,medidores2.marcaMedidor2,medidores2.fechaIngresoMedidor2 from medidores2 order by medidores2.fechaIngresoMedidor2";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idMedLis = $rs[0];
            $paisMedLis = $rs[1];
            $marMedLis = $rs[2];
            $fechMedLis = $rs[3];
            $nomContrato = $rs[9];  
            $medidoresLista = new medidores2($idMedLis,$paisMedLis,$marMedLis,$fechMedLis,$nomContrato);
            $lista[] = $medidoresLista;
        }
        $this->desconexion();
        return $lista;
    }

    public function listarUsuarios(){
        $this->conexion();
        $sql ="select * from usuarios";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idUsuLis = $rs[0];
            $logUsuLis = $rs[1];
            $nomUsuLis = $rs[2];
            $conUsuLis = $rs[3];
            $carUsuLis = $rs[4];
            $usuariosLista = new usuario($idUsuLis,$logUsuLis,$nomUsuLis,$conUsuLis,$carUsuLis);
            $lista[] = $usuariosLista;           
        }
        $this->desconexion();
        return $lista;
    }


    public function filtrado($condicion){
        $this->conexion();
        $sql="select tareas.idTarea, tareas.idMedidor2, usuarios.nombreUsuario, tareas.tareaTarea, tareas.estadoTarea, tareasRealizadas.qrTarRea,tareasRealizadas.obTarRea, tareas.fecha from tareas,usuarios,tareasRealizadas where tareas.idTarea=tareasRealizadas.idTar and tareas.idUsuario=usuarios.idUsuario $condicion";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idTarFil = $rs[0];
            $idMedFil = $rs[1];
            $nomUsuFil = $rs[2];
            $tarFil = $rs[3];
            $estadoFil = $rs[4];
            $qrFil = $rs[5];
            $obFil = $rs[6];
            $fecFil = $rs[7];
            $listaFiltrado = new listadoFinal($idTarFil,$idMedFil,$nomUsuFil,$tarFil,$estadoFil,$qrFil,$obFil,$fecFil);
            $lista[]=$listaFiltrado;
        }
        $this->desconexion();
        return $lista;
    }

    public function listarComunas(){
        $this->conexion();
        $sql ="select * from comunas order by nombreComuna ASC";
        $lista = array();
        $st = $this->mi->query($sql);
        while($rs = mysqli_fetch_array($st)){
            $idComuna=$rs[0];
            $nombreComuna = $rs[1];

            $listaComunas = new comunas($idComuna,$nombreComuna);
            $lista[] = $listaComunas;
            
        }
        $this->desconexion();
        return $lista;
    }    
 }
