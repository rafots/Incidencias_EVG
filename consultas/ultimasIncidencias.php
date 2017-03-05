<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();

$sql = "SELECT idIncidencia, alumnos.nombreCompleto, tipo_incidencias.nombre AS nombreINC, profesores.nombre AS nombrePROF FROM incidencias 
                INNER JOIN alumnos ON (alumnos.nia = incidencias.nia)
                INNER JOIN tipo_incidencias ON (tipo_incidencias.idTipo=incidencias.idTipo) 
                INNER JOIN profesores ON (profesores.idUsuario=incidencias.usuario) 
                WHERE fecha_ocurrencia <= CURRENT_DATE AND leidaT=0 LIMIT 10";

$conexion->consultas($sql);

?>