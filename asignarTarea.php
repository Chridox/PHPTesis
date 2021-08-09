<?php
session_start();

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

/*Se comprueba si existe una sesión activa, si no es asi redirige al usuario a la pantalla de incio mostrando un error*/
if (!isset($_SESSION['LOGIN'])) {
  header("location:index.php?msg=1");
}
/*---------------------------------------------------------------*/

/*Se conecta al acceso datos para asi poder usar los metodos hechos ahi*/
require 'class.accesodatos.php';
$a = new AccesoDatos();


?>
<!DOCTYPE html>

<html class="wide wow-animation" lang="en">
<head>
  <title>Asignar Trabajo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style>
    #map{
      
      width: 570px;
      height: 703px;
    }
  </style>
  <link rel="icon" href="template/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,700%7CPoppins:300,400,500,700,900">
  <link rel="stylesheet" href="template/css/bootstrap.css">
  <link rel="stylesheet" href="template/css/fonts.css">
  <link rel="stylesheet" href="template/css/style.css">
  <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>
  <?php
        /*Rescata datos de la sesion para mostrar el nombre de la persona que esta logeada y el cargo de est
        
        
        /*---------------------------------------------------------------*/
        $contador=0;
        $aaa="10";
        $bbb=$aaa+2;
        print $bbb;
        
        if (isset($_POST['btnRegTar'])) {
          $idMed = Permitido($_POST['cboMedidor']);
          $idUsu = Permitido($_POST['cboTrabajador']);
          $tarTT = Permitido($_POST['cboTarea']);
          $fec = Permitido($_POST['fechaTarea']);
          $fecFormat2 = date("d-m-Y", strtotime($fec));
          
          
          if (empty($fecFormat2) || $fecFormat2=="dd-mm-yyyy") {
            $contador=$contador+1;
            echo"<script>alert('Debe seleccionar una fecha valida')</script>'";
          }
          if ($tarTT=="0") {
            $contador=$contador+1;
          }

          if ($contador==0) {
            $tarea = new tarea(null,$idMed, $idUsu, $tarTT, $fecFormat2);
            $a->registrarTarea($tarea);
            echo"<script>alert('Registrado con exito')</script>";
          }else{
            echo"<script>alert('Existen errores')</script>";
          }
        }

        if (isset($_GET['ideli'])) {
          $id = Permitido($_GET['ideli']);
          $a->eliminarTarea($id);
        }
        ?>
        <div class="ie-panel"><a href="http://windows.microsoft.com/en-ES/internet-explorer/"><img src="template/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
        <div class="preloader">
          <div class="preloader-body">
            <div class="cssload-container">
              <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Cargando</p>
          </div>
        </div><a class="section section-banner d-none d-xl-block" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" target="_blank" style="background-image: url(template/images/background-02-1920x60.jpg); background-image: -webkit-image-set( url(template/images/background-02-1920x60.jpg) 1x, url(template/images/background-02-3840x120.jpg) 2x )"></a>
        <div class="page">
          <?php
          if (!isset($_SESSION['LOGIN'])) {
            header("location:index.php?msg=1");
          }else{
            echo "<header class='section page-header'>";
          } ?>
          <!--RD Navbar-->
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <!--RD Navbar Panel-->
                  <div class="rd-navbar-panel">
                    <!--RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!--RD Navbar Brand-->
                    <div class="rd-navbar-brand">
                      <!--Brand--><!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="template/images/logoAguacoopBlanco.png" alt="" width="100" height="17"/><img class="brand-logo-light" src="template/images/logoAguacoopAzul_1.png" alt="" width="100" height="17"/></a>
                    </div>
                  </div>
                  <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap">
                      <ul class="rd-navbar-nav">
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="asignarTarea.php">Asignar Trabajo</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="instalarMedidor.php">Instalar Medidor</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="listadoHistorico.php">Listado Historico</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="registrarUsuario.php">Registrar Usuario</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="cerrar.php">Cerrar Sesion</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </header>
        <section class="section section-intro context-dark">
          <div class="intro-bg" style="background: url(images/intro-bg-1.jpg) no-repeat;background-size:cover;background-position: top center;"></div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-8 text-center">
                <?php
                /*Rescata datos de la sesion para mostrar el nombre de la persona que esta logeada y el cargo de esta*/
                echo "<h1 class='font-weight-bold wow fadeInLeft'>Bienvenido: ".$_SESSION['NOMBRE']."</h1>";
                echo "<p class='intro-description wow fadeInRight'>Cargo: ".$_SESSION['CARGO']."</b></p>";
                ?>
                
              </div>
            </div>
          </div>
        </section>
        <!-- About page about section-->
        <section class="section section-md">
          <div class="container">
            <div class="row row-40 justify-content-center">
              <div class="col-lg-6 col-12">
                <div class="offset-top-45 offset-lg-right-45">
                  <h3 class="wow fadeInLeft text-capitalize" data-wow-delay=".3s">Asignar Trabajo</h3>
                  
                  <!--Inicio partes para rellenar -->
                  <form action="asignarTarea.php" method="post" name="formTarea" id="formTarea">
                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s">
                      <label for="cboTarea" name="cboTarea">Trabajo</label>
                      <select name="cboTarea" id="cboTarea" class="form-control">
                        <option value="0" selected="true">Seleccione una opcion</option>
                        <option value="Limpiar Fosa">Limpiar Fosa</option>
                        <option value="Reparar Medidor">Reparar medidor</option>
                        <option value="Toma de estado Medidor">Cambio de medidor</option>
                        <option value="Instalacion de cañerias">Instalacion de cañerias</option>
                        
                      </select>
                    </p>

                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s">
                      <label for="cboListaNoInstalado" name="cboListaNoInstalado">Medidor: </label>
                    </p>

                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s">  
                      <select class="form-control" name="cboMedidor">
                        <?php
                        $listaInstalados = $a->listarMedidorInstalado();
                        if (empty($listaInstalados)) {
                          echo"<option value=0>No existen medidores instalados</option>";
                        }else{

                          for($i=0; $i < count($listaInstalados); $i++){
                            $medidores2 = $listaInstalados[$i];
                            $mar = $medidores2->getMarcaInicialMedidor2();
                            $id = $medidores2->getIdMedidor2();
                            $nombreContrato = $medidores2->getNombreContratoMedidor2();
                            echo "<option value='$id'>Nro. Medidor: $id --- Contrato: $nombreContrato</option>";
                          }
                        }
                        ?>
                      </select>
                    </p>
                    
                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s"> 
                      <label for="txtNroInicialMed2" name="txtNroInicialMed2">Trabajador:</label>
                      <select name="cboTrabajador" class="form-control">
                        <?php
                        $listaUsuarios = $a->listarUsuario();
                        for($i=0; $i < count($listaUsuarios); $i++){
                          $usuario = $listaUsuarios[$i];
                          $nombreUsuario = $usuario->getNombreUsuario();
                          $idUsuario = $usuario->getIdUsuario();
                          echo "<option value='$idUsuario'>$nombreUsuario</option>";
                        }
                        ?>
                      </select>
                    </p>
                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s"> 
                      <label for="fechaTarea">Fecha</label>
                      <input type="date" id="fechaTarea" name="fechaTarea" required="" class="form-control">

                      <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s"> 
                        <button type="submit" name="btnRegTar" class="form-control">Asignar Tarea</button>
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-10 col-12">
                    <div class="block-decorate-img wow fadeInLeft" data-wow-delay=".2s" id="divTablaUsuario">
                      <table style=" width: 570; height: 351;"  border="1">
                        <tr>
                          <th>Id Tarea</th>
                          <th>Nro. Medidor</th>
                          <th>Trab Asignado</th>
                          <th>Trabajo</th>
                          <th>Fecha</th>
                          <th>Eliminar</th>
                        </tr>
                        <?php
                $lista = $a->listarTrabajos();
                for($i=0; $i < count($lista); $i++){
                  $trab = $lista[$i];
                  $idTT = $trab->getIdTarea();
                  $idMedTT = $trab->getIdMedidorTarea();
                  $nomY = $trab->getIdTrabajadorTarea();
                  $tarTT = $trab->getTareaTarea();
                  $fecTT = $trab->getFechTarea();
                  echo "<tr>";
                  echo "<td>$idTT</td>";
                  echo "<td>$idMedTT</td>";
                  echo "<td>$nomY</td>";
                  echo "<td>$tarTT</td>";
                  echo "<td>$fecTT</td>";
                  echo "<td><a href='asignarTarea.php?ideli=$idTT'>AQUI</a></td>";
                  echo "</tr>";
                } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

  <!--Fin partes para rellenar -->


  <!--Footer-->
  <footer class="section footer-classic section-sm">
      <div class="container">
        <div class="row row-30">
          <div class="col-lg-3 wow fadeInLeft">
              <!--Brand--><a class="brand" href="asignarTarea.php"><img class="brand-logo-dark" src="images/logoAguacoopBlanco.png" alt="" width="100" height="17"/><img class="brand-logo-light" src="template/images/logoAguacoopAzul_1.png" alt="" width="100" height="17"/></a>
            <p class="footer-classic-description offset-top-0 offset-right-25">La Cooperativa se propuso preocuparse de promover el racional desarrollo de la población y de sus viviendas, con sentido urbanístico de concentración dentro de límites adecuados, con el propósito de evitar la extensión desmedida, o injustificada de la localidad, hecho que repercutiría en las extensiones de redes.</p>
          </div>
          <div class="col-lg-3 col-sm-8 wow fadeInUp">
            <P class="footer-classic-title">Informacion de contacto</P>
            <div class="d-block offset-top-0">Camino a Termas N°684, VI Región-Chile.k<span class="d-lg-block">Olivar, Chile</span></div><a class="d-inline-block accent-link" href="mailto:#">aguacoop@aguacoop.com</a><a class="d-inline-block" href="tel:#">+72 2 222 222</a>
            <ul>
              <li>Lunes - Viernes:<span class="d-inline-block offset-left-10 text-white">9:30 AM - 8:00 PM</span></li>
              <li>Sabado<span class="d-inline-block offset-left-10 text-white">10:00 AM - 13:00 PM</span></li>
            </ul>
          </div>
          
          
        </div>
      </div>
      <div class="container wow fadeInUp" data-wow-delay=".4s">
        <div class="footer-classic-aside">
          <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
          
        </div>
      </div>
    </footer>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="template/js/core.min.js"></script>
<script src="template/js/script.js"></script>
</body>
</html>