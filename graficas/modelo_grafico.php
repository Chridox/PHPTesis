<?php
	class Modelo_Grafico{
		private $conexion;
		function __construct()
		{
			require_once('conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}


		function TraerDatosUsuarios(){
			$sql = "select * from usuarios where cargoUsuario='Trabajador'";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}

		function contarTareasUsuarios(){
			$sql="select usuarios.nombreUsuario,COUNT(tareas.idTarea) as TAREAS FROM usuarios,tareas where tareas.idUsuario=usuarios.idUsuario and tareas.estadoTarea=1 GROUP BY usuarios.idUsuario";
			$arreglo=array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function contarTareasUsuariosFiltro($fechainicio,$fechafin){
			$sql="select usuarios.nombreUsuario,COUNT(tareas.idTarea) as TAREAS FROM usuarios,tareas where tareas.idUsuario=usuarios.idUsuario and tareas.estadoTarea=1 and tareas.fecha BETWEEN '$fechainicio' and '$fechafin' GROUP BY usuarios.idUsuario";
			$arreglo=array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
                function contarTrabajosFiltro($fechainicio,$fechafin){
			$sql="select tareas.tareaTarea, count(tareas.idTarea) as TAREAS from tareas where tareas.estadoTarea=1 and tareas.fecha BETWEEN '$fechainicio' and '$fechafin' GROUP by tareas.tareaTarea" ;
			$arreglo=array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}

		function contarMedidoresYMarcas(){
			$sql="select medidores2.marcaMedidor2, COUNT(medidores2.idMedidor2) as MEDIDORES from medidores2 WHERE medidores2.instaladoMedidor2 = 1 GROUP BY medidores2.marcaMedidor2 ";
			$arreglo=array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}

		function contarTareasRealizadas(){
			$sql="SELECT tareas.tareaTarea, COUNT(tareas.idTarea) as TAREAS from tareas where tareas.estadoTarea=1 group by tareas.tareaTarea";
			$arreglo=array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}


function contarComunas(){
			$sql="select comunas.nombreComuna, count(medidores2.idMedidor2) as MEDIDORES from comunas,medidores2 where comunas.idComuna=medidores2.comunaMedidor and medidores2.instaladoMedidor2=1 GROUP by comunas.nombreComuna";
			$arreglo=array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}

        }
		
?>

