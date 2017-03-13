<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$objeto->consultas("SELECT tipoAnotacion as tipos,tipos_anotaciones.nombre as nombre from tipos_anotaciones inner join etapas ON tipos_anotaciones.codEtapa = etapas.codEtapa where tipos_anotaciones.codEtapa like '".$_SESSION["codEtapa"]."'");

?>