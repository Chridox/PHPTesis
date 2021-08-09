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
<html>
    <head>
        <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>Opciones</title>
    </head>
    <body  background="fondo2/fondo.png">
        
        
       
        <?php
        /*Rescata datos de la sesion para mostrar el nombre de la persona que esta logeada y el cargo de esta*/
        echo "<center>";
         echo "<h5><b>Bienvenido: ".$_SESSION['NOMBRE']."</b></h5>";
         echo "<p><b>Cargo: ".$_SESSION['CARGO']."</b></p>";
         echo "</center>";
         /*---------------------------------------------------------------*/
        ?>
         <h4 align="center"><b>Menu de Opciones</b></h4>
    <center>
   
        <fieldset  style="width: 510px;" style="align-content: center;">
        <table  style="width: 510px;">
            <tr >
                <td>
                    <form name="formAsignarTarea" method="post" action="asignarTarea.php">
                        <button align="center" style="width: 500px;" class="btn  waves-effect light-blue darken-4" name="irAsignarTarea" id="irAsignarTarea">Asignar Tarea</button>  
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form name="formRegistrarMedidor" method="post" action="registrarMedidores2.php">
                        <button align="center" style="width: 500px;" class="btn  waves-effect light-blue darken-4" name="irRegistrarMedidor" id="irRegistrarMedidor">Registrar Medidor</button>  
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form name="forminstalarMedidor" method="post" action="instalarMedidor.php">
                        <button align="center" style="width: 500px;" class="btn  waves-effect light-blue darken-4" name="irinstalarMedidor" id="irinstalarMedidor">Instalar Medidor</button>  
                    </form>
                </td>
            </tr>
            
            <tr>
                <td>
                    <form name="formListadoMedidores" method="post" action="listadoMedidores.php">
                        <button align="center" style="width: 500px;" class="btn  waves-effect light-blue darken-4" name="irListadoMedidores" id="irListadoMedidores">Listado Medidores</button>  
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form name="formRegistrarUsuario" method="post" action="registrarUsuario.php">
                        <button align="center" style="width: 500px;" class="btn  waves-effect light-blue darken-4" name="irRegistrarUsuario" id="irRegistrarUsuario">Registrar Usuario</button>  
                    </form>
                </td>
            </tr>
            <tr>
              <td>
                    <form name="formVerResumen" method="post" action="resumen.php">
                        <button align="center" style="width: 500px;" class="btn  waves-effect light-blue darken-4" name="irResumen" id="irResumen">Resumen </button>  
                    </form>
                </td>  
            </tr>
            <tr>
                <td><a style="text-align: center;" style="width: 150px;" class="btn red waves-effect" href="cerrar.php">Cerrar sesion</a></td>
            </tr>
        </table>
        </fieldset>
    </center>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
</html>