<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 09/03/2017
 * Time: 1:24
 */
require '../procedimientos/procedimientos.php';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script type="text/javascript" src="../sources/ajax.js"></script>';
echo '<script type="text/javascript" src="../sources/bootstrap.js"></script>';
$obj = new procedimientos();
$obj->conectar();
if(isset($_REQUEST['idIncidencia'])) {
        $query = 'SELECT t1.*,t3.nombre AS nombre ,t4.nombre as Hora,t5.nombre AS nombreProfe FROM incidencias t1 
                    INNER JOIN alumnos t2 ON t1.nia = t2.nia 
                    INNER JOIN tipo_incidencias t3 ON t1.idTipo = t3.idTipo 
                    INNER JOIN horas t4 ON t1.idHora = t4.idHora 
                    INNER JOIN profesores t5
                    WHERE t1.idIncidencia = "' . $_REQUEST['idIncidencia'] . '"';
    $obj->consultas($query);
    $fila = $obj->devolverFilas();
    echo '<table class="table table-bordered">';
    echo '<tr><th>Tipo Incidencia</th><th>Profesor</th><th>Asignatura</th><th>Hora</th><th>Fecha</th><th>Descripción</th></tr>';
    echo '<tr>';
        echo '<td>'.$fila["nombre"].'</td>';
        echo '<td>'.$fila['nombreProfe'].'</td>';
        echo '<td>'.$fila['codAsignatura'].'</td>';
        echo '<td>'.$fila['Hora'].'</td>';
        echo '<td>'.$fila['fecha_ocurrencia'].'</td>';
        echo '<td>'.$fila['descripcion'].'</td>';
    echo '</tr>';
    echo '</table>';
    $obj->cerrarConexion();
}