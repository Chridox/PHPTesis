<?php
require 'modelo_grafico.php';
$MG = new Modelo_Grafico();
$consulta = $MG->contarTareasRealizadas();
echo json_encode($consulta);
?>
