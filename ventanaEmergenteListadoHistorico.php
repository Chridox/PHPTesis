
<?php

function Permitido($variable){
	$variable = str_replace("<", "", $variable);
	$variable = str_replace(">", "", $variable);
	$variable = str_replace("'", "", $variable);
	$variable = str_replace("/", "", $variable);
	$variable = str_replace("//", "", $variable);
	$variable = str_replace("\\", "", $variable);
	$variable = str_replace(",", "", $variable);
	$variable = str_replace(";", "", $variable);
	$variable = str_replace("script", "", $variable);
	$variable = str_replace("delete", "", $variable);
	$variable = str_replace("insert", "", $variable);
	$variable = str_replace("update", "", $variable);
	$variable = str_replace("drop", "", $variable);
	$variable = str_replace("create", "", $variable);
	$variable = str_replace("show", "", $variable);
	$variable = str_replace("SCRIPT", "", $variable);
	$variable = str_replace("DELETE", "", $variable);
	$variable = str_replace("INSERT", "", $variable);
	$variable = str_replace("UPDATE", "", $variable);
	$variable = str_replace("DROP", "", $variable);
	$variable = str_replace("CREATE", "", $variable);
	$variable = str_replace("SHOW", "", $variable);
	$variable = str_replace("--", "", $variable);
	$variable = str_replace("(", "", $variable);
	$variable = str_replace(")", "", $variable);
	$variable = str_replace("}", "", $variable);
	$variable = str_replace("{", "", $variable);
	$variable = str_replace("[", "", $variable);
	$variable = str_replace("]", "", $variable);
	return $variable;  
}


require 'class.accesodatos.php';
$a = new accesodatos;

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
        <script src="js/moment.js"></script>
        <script src="js/moment-with-locales.js"></script>

	<title>Graficos</title>
</head>
<body>
	<div class="col-lg-12" style="padding-top: 20px;">
		<div class="card">
			<div class="card-header">
				Graficos
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-3">
						<canvas id="graficoBar" width="400" height="400"></canvas>
					</div>
                     <div class="col-lg-3">
					<canvas id="graficoUsuario" width="400" height="400"></canvas>	
					</div>
					<div class="col-lg-3">
					<canvas id="graficoComunas" width="400" height="400"></canvas>	
					</div>
					
					
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				Graficos por filtro
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-5">
						<label for="">Fecha Inicio</label>
						<input type="date" id="fechaInicio" name="fechaInicio">
					</div>
					<div class="col-lg-5">
						<label for="">Fecha Fin</label>
						<input type="date" id="fechaFin" name="fechaFin">
					</div>
					<div class="col-lg-2">
						<label for=>
						<button class="btn btn-danger" onclick="cargarDatosParametros()">Buscar</button>
					</div>
                                    <div class="col-lg-4">
					<canvas id="graficoUsuario_parametros" width="400" height="400"></canvas>
                                        </div>
                                    <div class="col-lg-4">
					<canvas id="graficoTrabajos_parametros" width="400" height="400"></canvas>
                                        </div>
				</div>
			</div>
		</div>
	</div>



</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" ></script>
<script src="js/moment.js"></script>
<script src="js/moment-with-locales.js"></script>

<script>
    
    cargarDatosGraficoBar();
    cargarDatosUsuarios();
    cargarDatosComunas();
    function cargarDatosParametros(){
        cargarDatosGraficoBarFiltro();
        cargarDatosUsuariosFiltro();
    }

	function cargarDatosGraficoBar(){
		$.ajax({
			url:'graficas/controladorGrafico.php',
			type:'POST'
		}).done(function(resp){
			if (resp.length>0) {
				var titulo=[];
				var cantidad=[];
				var colores=[];

				var data = JSON.parse(resp);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i][0]);
					cantidad.push(data[i][1]);
					colores.push(colorRGB());
				}
				crearGrafico(titulo,cantidad,colores,'bar','Cantidad de trabajos.','graficoBar');
			}

		})
	}
        
	function cargarDatosComunas(){
		$.ajax({
			url:'graficas/controlador_Comunas.php',
			type:'POST'
		}).done(function(resp){
			if (resp.length>0) {
				var titulo=[];
				var cantidad = [];
				var colores =[];
				var data = JSON.parse(resp);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i][0]);
					cantidad.push(data[i][1]);
					colores.push(colorRGB());
				}
				crearGrafico(titulo,cantidad,colores,'doughnut','Cantidad de trabajos por operador','graficoComunas');


			}
		})
	}
        

	function cargarDatosUsuarios(){
		$.ajax({
			url:'graficas/controlador_grafico.php',
			type:'POST'
		}).done(function(resp){
			if (resp.length>0) {
				var titulo=[];
				var cantidad = [];
				var colores =[];
				var data = JSON.parse(resp);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i][0]);
					cantidad.push(data[i][1]);
					colores.push(colorRGB());
				}
				crearGrafico(titulo,cantidad,colores,'bar','Cantidad de trabajos por operador','graficoUsuario');


			}
		})
	}

        function cargarDatosUsuariosFiltro(){
        moment.locale('nl');
        var dI = new Date($("#fechaInicio").val());
	var dF = new Date ($("#fechaFin").val());
        var fechaInicio = moment(dI).add(1,"days").format('L');
        var fechaFinal = moment(dF).add(1,"days").format('L');
		$.ajax({
			url:'graficas/controlador_grafico_parametro.php',
			type:'POST',
                        data:{
                            inicio: fechaInicio,
                            fin:fechaFinal
                        }
		}).done(function(resp){
			if (resp.length>0) {
				var titulo=[];
				var cantidad = [];
				var colores =[];
				var data = JSON.parse(resp);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i][0]);
					cantidad.push(data[i][1]);
					colores.push(colorRGB());
				}
				crearGrafico(titulo,cantidad,colores,'bar','Grafico de Barras','graficoUsuario_parametros');
                                

			}
		})
	}
        
        function cargarDatosGraficoBarFiltro(){
		moment.locale('nl');
        var dI = new Date($("#fechaInicio").val());
	var dF = new Date ($("#fechaFin").val());
        var fechaInicio = moment(dI).add(1,"days").format('L');
        
        var fechaFinal = moment(dF).add(1,"days").format('L');
		$.ajax({
			url:'graficas/cargarDatosGraficoBarFiltro.php',
			type:'POST',
                        data:{
                            inicio: fechaInicio,
                            fin:fechaFinal
                        }
		}).done(function(resp){
			if (resp.length>0) {
				var titulo=[];
				var cantidad = [];
				var colores =[];
				var data = JSON.parse(resp);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i][0]);
					cantidad.push(data[i][1]);
					colores.push(colorRGB());
				}
				crearGrafico(titulo,cantidad,colores,'bar','Grafico de Barras','graficoTrabajos_parametros');
                                
                                
			}

		})
	}



	function generarNumero(numero){
		return (Math.random()*numero).toFixed(0);
	}


	function colorRGB(){
		var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
		return "rgb" + coolor;
	}

			function crearGrafico(titulo,cantidad,colores,tipo,encabezado,id){
				var ctx = document.getElementById(id);
				var myChart = new Chart(ctx, {
					type: tipo,
					data: {
						labels: titulo,
						datasets: [{
							label: encabezado,
							data: cantidad,
							backgroundColor:colores,
							borderColor:colores,
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						}
					}
				});
			}

		</script>