<?php
require 'modelo_grafico.php';

$MG = new Modelo_Grafico();
$consulta= $MG->contarComunas();
echo json_encode($consulta);
?>