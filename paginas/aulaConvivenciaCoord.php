<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 08/03/2017
 * Time: 0:52
 */
require '../procedimientos/procedimientos.php';
$obj = new procedimientos();
$obj->conectar();
$query = "SELECT t1.*,t2.nombreCompleto,t3.nombre AS hora,t4.nombre AS profe
	FROM  incidencias t1 INNER JOIN alumnos t2
    	ON t1.nia = t2.nia
    INNER JOIN horas t3
    	ON t1.idHora = t3.idHora
    INNER JOIN profesores t4
    	ON t1.usuario = t4.idUsuario
	WHERE `idTipo` = 1 AND `archivadaC` = 0";
$obj->consultas($query);
echo '<table class="table table-hover">';
echo '<tr><th>Nombre</th><th>Redactado por</th><th>Asignatura</th><th>Hora</th><th>Fecha</th><th>Descripción</th></tr>';
while($fila = $obj->devolverFilas())
{
    echo '<tr><td>'.$fila["nombreCompleto"].'</td>';
    echo '<td>'.$fila["profe"].'</td>';
    echo '<td>'.$fila["codAsignatura"].'</td>';
    echo '<td>'.$fila["hora"].'</td>';
    echo '<td>'.$fila["fecha_ocurrencia"].'</td>';
    echo '<td>'.$fila["descripcion"].'</td></tr>';
}
echo '</table>';
$obj->cerrarConexion();