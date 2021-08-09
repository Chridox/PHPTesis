<?php
/* Funcion hecha para evitar inyecciones SQL, reemplaza los comandos mas populares por espacios vacios*/
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
/*-------------------------------------------*/
/*Se conecta al acceso datos para asi poder usar los metodos hechos ahi*/
    require 'class.accesodatos.php';
    $a = new accesodatos;
/*-------------------------------------------*/
    
    /*Codigo el cual rescata los datos de las casillas de log y contraseña y llama al metodo para validar el usuario, si los valores coinciden redirige
      a la pantalla principal del programa ademas de almacenar la sesion con los datos correspondientes. De lo contrario, redirige al usuario y muestra el error correspondiente
     * al codigo.     */
if (isset($_POST['btning'])) {

    $log = Permitido($_POST['txtlog']);
    $pas = Permitido($_POST['txtpas']);
        $usu = $a->validarUsuario($log, $pas);
    
    //$pas = md5($pas);
    
    if ($usu) {
        session_start();
        Permitido($_SESSION['LOGIN'] = $usu->getLogUsuario());
        Permitido($_SESSION['NOMBRE'] = $usu->getNombreUsuario());
        Permitido($_SESSION['CARGO'] = $usu->getCargoUsuario());
        header("location:asignarTarea.php");
        
        
    }else{
        header("location:index.php?msg=2");
    }
}else{
    header("location:index.php?msg=1");
}
/*-------------------------------------------*/
?>