<?php

class conexion{
		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;
		public function __construct(){
		    $this->servidor = "ns20.hostgator.cl";
			$this->usuario = "aguaproy_conexion";
			$this->contrasena = "12345";
			$this->basedatos = "aguaproy_aguacoop";
		}
		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			$this->conexion->set_charset("utf8");
		}
		function cerrar(){
			$this->conexion->close();	
		}
	}
        ?>

