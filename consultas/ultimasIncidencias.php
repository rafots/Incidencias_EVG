<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();

$sql = "SELECT *, idIncidencia, alumnos.nombreCompleto, tipo_incidencias.nombre AS nombreINC, profesores.nombre AS nombrePROF, horas.nombre AS nombreHora FROM incidencias 
                INNER JOIN alumnos ON (alumnos.nia = incidencias.nia)
                INNER JOIN tipo_incidencias ON (tipo_incidencias.idTipo=incidencias.idTipo) 
                INNER JOIN profesores ON (profesores.idUsuario=incidencias.usuario)
                INNER JOIN horas ON (horas.idHora=incidencias.idHora)
                WHERE fecha_ocurrencia <= CURRENT_DATE ORDER BY leidaT DESC";

$conexion->consultas($sql);

?>