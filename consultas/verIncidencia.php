<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();

$codigo = $_GET["codigo"];

$sql = "SELECT *, alumnos.nombreCompleto, tipo_incidencias.nombre AS nombreINC, profesores.nombre AS nombrePROF, horas.nombre AS nombreHora FROM incidencias 
                INNER JOIN alumnos ON (alumnos.nia = incidencias.nia)
                INNER JOIN tipo_incidencias ON (tipo_incidencias.idTipo=incidencias.idTipo) 
                INNER JOIN profesores ON (profesores.idUsuario=incidencias.usuario) 
                INNER JOIN horas ON (horas.idHora=incidencias.idHora)WHERE idIncidencia = '".$codigo."'";

$conexion->consultas($sql);

?>