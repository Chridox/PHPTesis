<?php
require 'modelo_grafico.php';

$MG = new Modelo_Grafico();
$consulta= $MG->contarTareasUsuarios();
echo json_encode($consulta);
?>